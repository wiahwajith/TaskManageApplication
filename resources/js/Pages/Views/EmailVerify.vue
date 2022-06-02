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
				<!-- email verify -->
				<a-result
					status="success"
					title="A fresh verification link has been sent to your email address.!"
					sub-title="Before proceeding, please check your email for a verification link."
				>
					<template #extra>
					<a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">
						<a-button key="console" type="primary">Check Mail</a-button>
					</a>
					<a-button key="buy" @Click="handleSubmit" >Try Again</a-button>
					</template>
				</a-result>
				<!-- email verify -->
				<p class="font-semibold text-muted">Don't have an account? <inertia-link :href="$route('register')" class="font-bold text-dark">Sign Up</inertia-link></p>
			</a-col>
			<!-- / Sign In Form Column -->

			<!-- Sign In Image Column -->
			<a-col :span="24" :md="12" :lg="12" :xl="12" class="col-img">
				<img src="/images/img-signin.jpg" alt="">
			</a-col>
			<!-- Sign In Image Column -->

		</a-row>
		
	</div>
</template>

<script>
import { showAlert } from "../../Utility/Utility";
import Swal from "sweetalert2";
	export default ({
		component:{
		},
		methods: {
			// Handles input validation after submission.
			handleSubmit() {
				this.$inertia.post(
                route("verification.resend"),
                {
					onFinish: () => {
                        showAlert(this.$page);
                    },
                }
            );
			Swal.fire("Success!", 'email resend successfully!', "success");	
			},
		},
	})

</script>

<style lang="scss">
	body {
		background-color: #ffffff;
	}
</style>