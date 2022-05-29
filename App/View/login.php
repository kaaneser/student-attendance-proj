<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance - Login</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Vuejs -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Local CSS Import -->
    <style>
        #background-image {
            background-image: url("App/View/Assets/background_image.png");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="background-image" class="bg-image shadow-2-strong">
        <div id="app" class="container h-100" >
            <div class="row align-items-center h-100">
                <div class="col-6 mx-auto">
                    <div class="card rounded-lg shadow h-100 justify-content-center" style="background-color: white;">
                        <div class="text-center m-3">
                            <h3>LiepU Student Attendance - Login</h3>
                            <!-- Server side control -->
                            <form class="py-3" action="" method="POST">
                                <div class="form-group">
                                    <select @change="onChange($event)" name="" id="">
                                        <option value="staff">Faculty Staff</option>
                                        <option value="professor">Professor</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>User ID:</label>
                                    <input v-model="user['user_id']" type="text" name="studentNum">
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <input v-model="user['pass']" type="text" name="studentNum">
                                </div>

                                <div class="py-3">
                                    <button @click="login()" type="button" class="btn btn-primary">Login</button>
                                </div>
                                
                            </form>
                            <div v-show="error" class="alert alert-danger">
                                Error occured while logging in.
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: "#app",
            data: {
                id: "",
                pass: "",
                userType: "",
                error: false,
                user: {
                    'user_id': "",
                    'pass': "",
                    'user_type': ""
                }
            },
            methods: {
                async login() {
                    this.error = false;
                    var formData = new FormData();

                    await formData.append('user', JSON.stringify(this.user));

                    console.log(formData.get('user'));
                    
                    await axios.post('/login', formData).then((res) => {
                        
                        if (res.data == 'err'){
                            this.error = true;
                        } else {
                            console.log(res);
                        }

                    });
                },
                onChange(e) {
                    this.user['user_type'] = e.target.value;
                }
            }
        })  
    </script>

</body>
</html>