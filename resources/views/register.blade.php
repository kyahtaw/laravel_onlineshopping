
  
@extends('master')

@section('content')
  <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
      <div class="container">
        <h1 class="text-center text-white"> Create Account </h1>
      </div>
  </div>
  
  <!-- Content -->
  <div class="container my-5">

    <div class="row justify-content-center">
      <div class="col-8">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
          @csrf
                  <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="small mb-1" for="inputName"> Name</label>
                          <input class="form-control py-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="inputName" type="text" placeholder="Enter Name" />
                        </div>
                    </div>
                        
                    

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address"  />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="inputPassword">Password</label>
                              <input class="form-control py-4 @error('password') is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Enter password"  />
                              <font id="error" color="red"></font>

                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                              <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="password_confirmation" />
                              <font id="cerror" color="red"></font>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="small mb-1" for="inputPhone"> Phone</label>
                            <input class="form-control py-4 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="inputPhone" type="text" placeholder="Enter Phone" />
                            @error('phone')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>
                      </div>
                          
                      

                      <div class="col-md-6">
                          <label class="small mb-1" for="inputEmailAddress">Address</label>
                          <textarea class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" id="inputEmailAddress" >
                            @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </textarea>

                          
                      </div>
                    </div>


                     <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="small mb-1" for="inputPhone"> Photo </label>
                            <input class="form-control-file py-4 @error('photo') is-invalid @enderror input_photo" name="photo" value="{{ old('photo') }}" id="inputPhone" type="file" placeholder="Enter Phone" />

                            @error('photo')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                           <img src="" class="img-fluid show_photo d-inline-block" >
                        </div>
                      </div>
                          
                    
                    </div>

                   
              
              <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                
                <button type="submit" class="btn btn-secondary mainfullbtncolor btn-block"> Create Account </button>
              </div>
          </form>

          <div class=" mt-3 text-center ">
            <a href="#" class="loginLink text-decoration-none">Have an account? Go to login</a>
          </div>
      </div>
    </div>

  </div>
@endsection

