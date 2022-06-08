<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<AdminDashboard>

	<div style="background: #ececec; padding: 30px">
		<a-card title="Card title" :bordered="false" style="width: 300px">
		<p>Card content</p>
		<p>Card content</p>
		<p>Card content</p>
		</a-card>
	</div>

	</AdminDashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import AdminDashboard from '../../layouts/AdminDashboard' ;
	import { showAlert } from "../../Utility/Utility";
	import Swal from "sweetalert2";
	import { UserSwitchOutlined, TeamOutlined, UserAddOutlined, SmileOutlined, DownOutlined  } from '@ant-design/icons-vue';
	import { ref } from 'vue';






	export default ({
		components: {
			AdminDashboard,
			UserAddOutlined,
			TeamOutlined,
			UserSwitchOutlined,
			SmileOutlined,
			DownOutlined,
		},
		props: [
			'employers',
			'roles',
		],
		data() {
		
				
		},

		
	});

</script>

<style lang="scss">
</style>