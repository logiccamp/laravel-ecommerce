<template>
    <div>
        <div class="login-popup"  v-if="showLogin">
             <section class="bg-home d-flex align-items-center position-relative" style="height: 100%" >
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-signin p-4 bg-white rounded shadow">
                                <form>
                                    <a href="/"><img src="images/logo-icon.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                    <h5 class="mb-3 text-center">Please sign in</h5>
                                
                                    <div class="form-floating mb-2">
                                        <input v-model="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input v-model="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                
                                    <div class="d-flex justify-content-between">
                                        <p class="forgot-pass mb-0"><a href="/password-reset" class="text-dark small fw-bold">Forgot password ?</a></p>
                                    </div>
                    
                                    <div v-if="isLoading">
                                        <a href="#?loading" class="btn btn-primary disabled w-100" >Loading...</a>
                                    </div>
                                    <a v-else href="#?" @click="login" class="btn btn-primary w-100" type="submit">Sign in</a>

                                    <div v-if="isErrorL">
                                        <p class="text-danger text-center">{{errmessageL}}</p>
                                        <ul class="text-danger">
                                            <li v-for="(errors, index) in mainErrorL" :key="index">
                                                <span v-for="(err, index) in errors" :key="index">{{err}}, </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> 
                                        <a href="#?" @click="toggleSignup()" class="text-dark fw-bold">Sign Up</a></p>
                                    </div><!--end col-->
                                </form>
                            </div>
                            <p class="text-center">
                                <a href="#?" @click="closeLogin" style="text-decoration: none; font-weight: bold" class="btn btn-link" >close</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="login-popup"  v-if="showSignup">
        <section  class="bg-home d-flex align-items-center position-relative" style="background: url('images/shape01.png') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-signin p-4 bg-white rounded shadow">
                            <form>
                                <a href="index.html"><img src="images/logo-icon.png" class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">Register your account</h5>
                            
                                <div class="form-floating mb-2">
                                    <input v-model="fname" type="text" class="form-control" id="floatingInput" placeholder="Harry">
                                    <label for="floatingInput">First Name</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input v-model="lname" type="text" class="form-control" id="floatingInput" placeholder="Styles">
                                    <label for="floatingInput">Last Name</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input v-model="semail" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                                    <label for="floatingEmail">Email Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input v-model="spassword" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div v-if="isLoading">
                                    <a href="#?loading" class="btn btn-primary disabled w-100" >Loading...</a>
                                </div>
                                <a v-else @click="register" class="btn btn-primary w-100 text-white" type="submit">Register</a>
                                <div v-if="isError">
                                    <p class="text-danger text-center">{{errmessage}}</p>
                                    <ul class="text-danger">
                                        <li v-for="(errors, index) in mainError" :key="index">
                                            <span v-for="(err, index) in errors" :key="index">{{err}}, </span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small>
                                    <a href="#?" @click="loginPage()" class="text-dark fw-bold">Sign in</a></p>
                                </div><!--end col-->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>

    </div>
</template>


<script>
export default {
    data () {
        return {
            showLogin : false,
            showSignup : false,
            fname : "",
            lname : "",
            semail : "",
            spassword : "",
            email : "",
            password : "",
            errmessage : "",
            isError : false,
            errmessageL : "",
            isErrorL : false,
            isLoading : false,

            mainError : [],
            mainErrorL : [],
        }
    },
    methods: {
        register(){
            this.isLoading = true;
            this.isError = false;
            this.mainError = [];
            setTimeout(async () => {
                if (this.fname == "" || this.lname == "" || this.semail == "" || this.spassword == ""){
                    this.isError = true;
                    this.errmessage = "All fields are required"
                    this.isLoading = false;
                    return false;
                }
                // if (password.length < 8){
                //     this.isError = true;
                //     this.errmessage = "Please use a secure password"
                //     this.isLoading = false;
                //     return false;
                // }
                var data = {
                    "fname" : this.fname,
                    "lname" : this.lname,
                    "email" : this.semail,
                    "password" : this.spassword,
                };
                let self = this;
                await axios.post('/signupbk', data)
                .then((response)=> {
                    if (response.data == true) {
                        window.location.reload()
                    }else{
                        this.isError = true;
                        this.errmessage = "an error occur, please try again"
                        this.isLoading = false;
                    }
                    
                })
                .catch((error)=>{
                    console.log(error.response.data.errors)
                    self.isError = true;
                    self.errmessage = "";
                    self.mainError = error.response.data.errors
                    console.log('hello')
                })
                
                this.isLoading = false;

            }, 2000);
        },
        

        login(){
            this.isLoading = true;
            this.isError = false;
            this.errmessageL = ""
            this.mainError = [];
            setTimeout(async () => {
                if (this.email == "" || this.password == "" ){
                    this.isErrorL = true;
                    this.errmessageL = "All fields are required"
                    this.isLoading = false;
                    return false;
                }
                
                var data = {
                    "email" : this.email,
                    "password" : this.password,
                };
                let self = this;
                await axios.post('/loginbk', data)
                .then((response)=> {
                    if (response.data.status == true) {
                        window.location.reload()
                    }else{
                        this.isErrorL = true;
                        this.errmessageL = response.data.message
                        this.isLoading = false;
                    }
                    
                })
                .catch((error)=>{
                    console.log(error.response.data.errors)
                    self.isErrorL = true;
                    self.errmessageL = "";
                    self.mainErrorL = error.response.data.errors
                })
                
                this.isLoading = false;

            }, 2000);
        },
        toggleSignup(){
            this.showLogin = false;
            this.showSignup = true;
            this.isError = false;
        },
        loginPage(){
            this.showLogin = true;
            this.isError = false;
            this.showSignup = false;
        },

        closeLogin() {
            this.showLogin = false;
            this.isError = false;
            this.showSignup = false;
        }
    },
    mounted() {
        this.$root.$on("toggleLogin", () => {
            this.showLogin = !this.showLogin
            this.showSignup = false
            // this.showLogin = !this.showLogin
            // this.showSignup = false
        })
    },
}
</script>