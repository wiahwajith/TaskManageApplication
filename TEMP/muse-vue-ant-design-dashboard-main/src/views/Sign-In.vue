<!-- 
	This is the sign in page, it uses the dashboard layout in: 
	"./layouts/Default.vue" .
 -->

<template>
	<div class="sign-in">
		
		<a-row type="flex" :gutter="[24,24]" justify="space-around" align="middle">

			<!-- Sign In Form Column -->
			<a-col :span="24" :md="12" :lg="{span: 12, offset: 0}" :xl="{span: 6, offset: 2}" class="col-form">
				<h1 class="mb-15">Sign In</h1>
				<h5 class="font-regular text-muted">Enter your email and password to sign in</h5>

				<!-- Sign In Form -->
				<a-form
					id="components-form-demo-normal-login"
					:form="form"
					class="login-form"
					@submit="handleSubmit"
				>
					<a-form-item class="mb-10" label="Email" >
						<a-input 
						placeholder="Email" />
					</a-form-item>
					<a-form-item class="mb-5" label="Password">
						<a-input
						type="password" placeholder="Password" />
					</a-form-item>
					<a-form-item class="mb-10">
						<a-switch v-model="rememberMe" /> Remember Me
					</a-form-item>
					<a-form-item>
						<a-button type="primary" block html-type="submit" class="login-form-button">
							SIGN IN
						</a-button>
					</a-form-item>
				</a-form>
				<!-- / Sign In Form -->

			
			</a-col>
			<!-- / Sign In Form Column -->

			<!-- Sign In Image Column -->
			<a-col :span="24" :md="12" :lg="12" :xl="12" class="col-img">
				<img src="images/img-signin.jpg" alt="">
			</a-col>
			<!-- Sign In Image Column -->

		</a-row>
		
	</div>
</template>

<script>

	export default ({
		data() {
			return {

				form:{

				},
				// Binded model property for "Sign In Form" switch button for "Remember Me" .
				rememberMe: true,
			}
		},
		methods: {
			// Handles input validation after submission.
			handleSubmit(e) {
				e.preventDefault();
				this.form.validateFields((err, values) => {
					if ( !err ) {
						console.log('Received values of form: ', values) ;
					}
				});
			},
		},
		watch: {
			lastAndMarkPrice: {
				deep: true,

				handler (newValue, oldValue) {
				// ...
				}
			}
			}
	})

</script>

<style lang="scss">
	body {
		background-color: #ffffff;
	}
</style>