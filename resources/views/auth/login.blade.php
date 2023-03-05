<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

    <title>Login</title>
</head>

<body>

    <section class="vh-100" style="background-color: #5d7fe6;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="{{ asset('image/gambar.png') }}"
                     class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="{{ route('login.process') }}" method="POST">
                          @csrf
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <img src="{{ asset('image/logo.png')}}" width="85px" height="85px">
                          <span class="h1 fw-bold mb-0">Abroor Laundry</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign In</h5>

                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example17" class="form-control form-control-lg" name="username"/>
                          <label class="form-label" for="form2Example17">Username</label>
                          {{-- @error('username')
                           <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror --}}
                        </div>

                        <div class="form-outline mb-4">
                          <input type="password" id="form2Example27" class="form-control form-control-lg" name="password"/>
                          <label class="form-label" for="form2Example27">Password</label>
                          {{-- @error('password')
                           <div class="alert alert-danger mt-2">{{ $message }}</div>
                          @enderror --}}
                        </div>

                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Login Now</button>
                        </div>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


</body>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js">
</script>

</html>
