<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Page</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="admin/assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="visitor.php"><i class="fas fa-user-friends"></i>My Visitors</a>
                </li>
                <li>
                    <a href="profile.php"><i class="fas fa-cog"></i>Profile</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span id="user-name"></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="profile.php" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="visitor.php" class="dropdown-item"><i class="fas fa-envelope"></i> My visitors</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><form><a type="submit" id="logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></form></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
<div>
<div class="content d-flex bg-primary mx-auto my-auto h-100">
</div>
    <div class="container">
        <div class="page-title">
            <h3>Profile</h3>
        </div>


        <div class="box box-primary" id="profile">
            <div class="box-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="general" aria-selected="true">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link-tab" data-toggle="tab" href="#links" role="tab" aria-controls="email" aria-selected="false">Media Links</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="col-md-6">
                                <p class="text-muted">General settings to change user data</p>
                                <form>
                                    <div class="form-group">
                                        <label for="site-title" class="form-control-label">Full Name</label>
                                        <input type="text" id= "full_name" name="full_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Phone number</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-control-label">Short Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="4"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success" id="submit_user_data" type="submit"><i class="fas fa-check"></i> Save</button>
                                    </div>
                                </form>
                                <form method="post" action ="{{route('test')}}" enctype="multipart/form-data">
                                @csrf
                                <input id="file" type="file" name="file">
                                <input id="submit_profile_pic" type="submit" name="submit">
                                   
                                </form>
                            </div>
                        </div>
                    

                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <div class="col-md-6">
                            <p class="text-muted">My Company data</p>
                            <div class="form-group">
                                <label for="company_name" class="form-control-label">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Company Phone number</label>
                                <input type="text" id="company_phone_number" name="company_phone_number" class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success" id="submit_user_company_data" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="link-tab">
                        <div class="col-md-6">
                            <p class="text-muted">Website and Social media links</p>
                            <div class="form-group">
                                <label for="" class="form-control-label">Website Link</label>
                                <input type="text" id="website_link" name="website_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Facebook Link</label>
                                <input type="text" id="facebook_link" name="facebook_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Twitter Link</label>
                                <input type="text" id="twitter_link" name="twitter_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Instagram Link</label>
                                <input type="text" id="instagram_link" name="instagram_link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Linkedin Link</label>
                                <input type="text" id="linkedin_link"  name="linkedin_link" class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-success" id="submit_links_data" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>   
                    
        </div>
    </div>
</div>
</div>
</div>

<script>
    var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE2MjE4NDYxMDEsImV4cCI6MTYyMTg0OTcwMSwibmJmIjoxNjIxODQ2MTAxLCJqdGkiOiJYaTUxUTlDYzNJbHNqazlZIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.7pm1kgeptLQRwOMgT5UljUc9JFp97ODdfUtzS-zxRW4";
    axios.defaults.baseURL = 'http://localhost:8001/api/v1/';
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
    axios.defaults.headers.common['Content-Type'] = 'multipart/form-data';
    axios.get('/profile').then(function(response){
        
        console.log(response.data);
        $('#spinner').css('display', 'none');
        $('#profile').css('display', 'block');
        //var links = JSON.parse(response.data.profile_details.links);
        $('#full_name').val(response.data.profile_details.full_name);
        $('#company_name').val(response.data.profile_details.company_name);
        $('#email').val(response.data.user.email);
        $('#job_role').val(response.data.profile_details.job_role);
        $('#phone_number').val(response.data.profile_details.phone_number);
        $('#company_phone_number').val(response.data.profile_details.company_phone_number);
        $('#bio').val(response.data.profile_details.bio);
        /*$('#facebook_link').val(links.facebook_link);
        $('#website_link').val(links.website_link);
        $('#instagram_link').val(links.instagram_link);
        $('#linkedin_link').val(links.linkedin_link);*/
        //console.log(response.data);
        
    }).catch(function (error) {
        $('#spinner').css('display', 'none');
        console.log(error);
    })

    $(document).ready(function () {
        $('#submit_user_data').click(function (event) {
            
            console.log()
            
            event.preventDefault();
            //axios.defaults.headers.common['Content-Type'] = 'multipart/form-data';
            axios.patch('/profile/update', {
                full_name:$('#full_name').val(),
                email:$('#email').val(),
                job_role:$('#job_role').val(),
                phone_number:$('#phone_number').val(),
                bio:$('#bio').val(),
                profile_pic:$('#profile_pic').prop('files')[0],
            }).then(function(response){
                console.log(response.data);
            }).catch(function (error) {
                console.log(error.request.responseText);
            })
        });

        $('#submit_profile_pic').click(function (event) {
            $form = new FormData();
            $file = $('#file').prop('files')[0];
            $form.append("file", $file);
            $token = $('#file').prop('files')[0];
            event.preventDefault(); 
            const headers = {
                'content-type': 'multipart/form-data',
            }
            axios.patch('/profile/update', {
                file: $('#file').prop('files')
            }).then(function(response){
                console.log(response);
            }).catch(function (error) {
                console.log(error.request.responseText);
            })
        });
        
        $('#submit_user_company_data').click(function (event) {
            event.preventDefault(); 
            axios.patch('/profile/update', {
                company_name:$('#company_name').val(),
                company_phone_number:$('#company_phone_number').val(),
            }).then(function(response){
                console.log(response.data);
            }).catch(function (error) {
                console.log(error.message);
            })
        });


        $('#submit_links_data').click(function (event) {
            event.preventDefault(); 
            axios.patch('/profile/update', {
                facebook_link:$('#facebook_link').val(),
                website_link:$('#website_link').val(),
                instagram_link:$('#instagram_link').val(),
                linkedin_link:$('#linkedin_link').val(),
                twitter_link:$('#twitter_link').val(),
            }).then(function(response){
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            })
        });
    })

</script>
</body>

</html>