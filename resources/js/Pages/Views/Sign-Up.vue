<!-- 
	This is the sign up page, it uses the dashboard layout in: 
	"./layouts/Default.vue" .
 -->

<template>
	<div>

		<!-- Sign Up Image And Headings -->
		<div class="sign-up-header" style="background-image: url('images/bg-signup.jpg')">
			<div class="content">
				<h1 class="mb-5">Sign Up</h1>
				<p class="text-lg">Use these awesome forms to login or create new account in your project for free.</p>
			</div>
		</div>
		<!-- / Sign Up Image And Headings -->
		
		<!-- Sign Up Form -->
		<a-card :bordered="false" class="card-signup header-solid h-full" :bodyStyle="{paddingTop: 0}">
			<template #title>
				<h5 class="font-semibold text-center">Register With</h5>
			</template>
			<div class="sign-up-gateways">
    			<a-button>
					<img src="images/logos/logos-facebook.svg" alt="">
				</a-button>
    			<a-button>
					<img src="images/logos/logo-apple.svg" alt="">
				</a-button>
    			<a-button>
					<img src="images/logos/Google__G__Logo.svg.png" alt="">
				</a-button>
			</div>
			<p class="text-center my-25 font-semibold text-muted">Or</p>
			<a-form
				id="components-form-demo-normal-login"
				class="login-form"
				:model="form"
				@submit="handleSubmit"
			>

			<!-- <input type="text" v-model="form.name"> -->
				<a-form-item class="mb-10">
					<a-input
						type="text"
						v-model:value="form.name"
						placeholder="Name"
					>	
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-input
						v-model:value="form.email"
						placeholder="Email"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-5">
					<a-input
						v-model:value="form.password"
						type="password"
						placeholder="Password"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-5">
					<a-input
						v-model:value="form.password_confirmation"
						type="password"
						placeholder="Password Confirm"
					>
					</a-input>
				</a-form-item>
				<a-form-item class="mb-10">
					<a-checkbox
						v-model:value="form.remember"
					>
						I agree the <a href="#" class="font-bold text-dark">Terms and Conditions</a>
					</a-checkbox>
				</a-form-item>
				<a-form-item>
					<a-button type="primary" block html-type="submit" class="login-form-button">
						SIGN UP
					</a-button>
				</a-form-item>
			</a-form>
			<!-- <p class="font-semibold text-muted text-center">Already have an account? <router-link to="/sign-in" class="font-bold text-dark">Sign In</router-link></p> -->
		</a-card>
		<!-- / Sign Up Form -->

	</div>
</template>

<script>
import { showAlert } from "../../Utility/Utility";

	export default ({
		data() {
			return {
				form:{
					name:'',
					email:'',
					password:'',
					password_confirmation:'',
					remember:'',
				}
			}
		},
		methods: {
			// Handles input validation after submission.
			handleSubmit() {
				this.$inertia.post(
                route("register"),
                this.form,
                {
					
					onFinish: () => {
						console.log(this.form.name);
                        showAlert(this.$page);
                    }
                }
            );	
			},
		},
	})

</script>

<style lang="scss">
</style>