$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  update_cart_count();
  show_cart();
  /*update_cart_count();*/

  $(".addtocartBtn").click(function(){
    var item_id = $(this).data('id');
    var item_name=$(this).data('name');

    var item_photo=$(this).data('photo');
    var item_price=$(this).data('price');
    var item_discount=$(this).data('discount');
    /*alert(item_photo);*/
    var product={
      id:item_id,
      name:item_name,

      photo:item_photo,
      price:item_price,
      discount:item_discount,
      quantity:1
    }
    /*console.log(product);*/
    add_to_cart(product);
    update_cart_count();
  })




  function add_to_cart(product){
    var mycart=localStorage.getItem('mycart');
    if(!mycart){
              mycart='{"product_list":[]}';//creat json string
            }
            var mycart_obj=JSON.parse(mycart);
            /* console.log(mycart_obj);*/
            var has_id=false;
            $.each(mycart_obj.product_list,function(i,v){
              if(v.id==product.id){
                has_id=true;
                v.quantity+=1;
              }
            })
            if(!has_id){mycart_obj.product_list.push(product);};
            //push profuct into mycata_obj
            //convert mycart to JSON string and store in localstorage
            localStorage.setItem('mycart',JSON.stringify(mycart_obj));
          }


          function update_cart_count(){

            var mycart=localStorage.getItem('mycart');
            if(mycart){
              var mycart_obj=JSON.parse(mycart);
              //check lilst array
              if(mycart_obj.product_list.length){
                var count=0; var total=0;
                $.each(mycart_obj.product_list,function(i,v){
                  /*console.log(i,v);*/
                  count+=v.quantity;
                  var subtotal=v.price*v.quantity;
                  total+=subtotal;

                })
                $(".cartNoti").html(count);
                $(".total").html(total);
              }
            }
          }






          $("#shoppingcart_table").on('click','.remove',function(){
            var id=$(this).data('id');
            console.log(id);

            var mycart=localStorage.getItem('mycart');
            var mycart_obj=JSON.parse(mycart);//change string to array
            $.each(mycart_obj.product_list,function(i,v){
              if(v){
                if(v.id==id){
                  var ans=confirm('Are you sure to delete?');
                  if(ans){
                    console.log(mycart_obj);
                    mycart_obj.product_list.splice(i,1);
                    console.log(mycart_obj);
                  }
                } 
              }
            })
            localStorage.setItem('mycart', JSON.stringify(mycart_obj));
            show_cart();
            update_cart_count();
          })


          //Clear work loclstroage
          $(".btn_logout").click(function(){
            
                  localStorage.clear();
                  update_cart_count();
            })

            $("#shoppingcart_table").on('click','.plus_btn',function(){
              var id=$(this).data('id');
              /*alert(id);*/
              var mycart=localStorage.getItem('mycart');
              var mycart_obj=JSON.parse(mycart);
              $.each(mycart_obj.product_list,function(i,v){
                if(v.id==id){
                  v.quantity++;
                }
              })
              localStorage.setItem('mycart', JSON.stringify(mycart_obj));
              show_cart();
              update_cart_count();
            })



            $("#shoppingcart_table").on('click','.minus_btn',function(){
              var id=$(this).data('id');
              /*alert(id);*/
              var mycart=localStorage.getItem('mycart');
              var mycart_obj=JSON.parse(mycart);
              $.each(mycart_obj.product_list,function(i,v){
                if(v){
                  if(v.id==id){
                    if(v.quantity==1){
                      var ans=confirm('Are you sure to delete?');
                      if(ans){
                        console.log(mycart_obj);
                        mycart_obj.product_list.splice(i,1);
                        console.log(mycart_obj);
                      }
                    }else{

                     v.quantity--;
                   } 
                 } 
               }
             })
              localStorage.setItem('mycart', JSON.stringify(mycart_obj));
              show_cart();
              update_cart_count();
            })




            function show_cart(){
              var mycart=localStorage.getItem('mycart');
              /*if(mycart){*/
                // console.log(mycart);
                var mycart_obj=JSON.parse(mycart);
                if(mycart_obj){
                  var html='';
                  var j=1; var total=0;
                  $.each(mycart_obj.product_list,function(i,v){
                    if(v){
                      var id=v.id;
                      var product_name=v.name;
                      var product_price=v.price;
                      var product_photo=v.photo;
                      var product_discount=v.discount;
                      var quantity=v.quantity;
                      var subtotal=quantity*product_price;
                      total+=subtotal;

                      html+=`<tr>
                      <td>${j}</td>
                      <td>${product_name}</td>
                      <td><img src='${product_photo}' width=120 height=100></td>
                      <td>${product_price}</td>
                      <td>${product_discount}</td>
                      <td>
                      <button class="btn btn-outline-secondary plus_btn" data-id=${v.id}> 
                      <i class="icofont-plus"></i> 
                      </button>
                      <span class='badge badge-success' style='font-size:20px'>${quantity}</span>
                      <button class="btn btn-outline-secondary minus_btn" data-id=${v.id}> 
                      <i class="icofont-minus"></i>
                      </button>
                      </td>
                      <td>${subtotal}</td>
                      <td>
                      <button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-id=${v.id}> 
                      <i class="icofont-close-line"></i> 
                      </button>
                      </td>


                      </tr>`;
                      j++;
                    }
                  })
                  html+=`<tr><td colspan=6></td>
                  <td>Total:&nbsp;&nbsp;${total}Ks</td></tr>`;
                  $("#shoppingcart_table").html(html);
                }else{
                  $("#shoppingcart_table").html('');
                }
            /*}*//*else{
              $("table").html('');
              $(".btn_order").hide();
            }*/
          }


          //for buy Now
          $('.buy_now').on('click',function(){
            // alert('Hello!');

            var notes = $('.notes').val();

            //var total= $('.total').val();
            var shopString =localStorage.getItem("mycart");
            // console.log(shopString);
            if(shopString){
              //var shopArray =JSON.parse(shopString);

              $.post('/orders',{shop_data:shopString,notes:notes},function(response){
                if(response){
                  alert(response);
                  
                  localStorage.clear();
                  show_cart();
                  location.href="/";
                }
              })
            }
          })

          

        })