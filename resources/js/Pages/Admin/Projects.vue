<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<!-- <Dashboard></Dashboard> -->
	<AdminDashboard>
		<div class="components-page-header-demo-content">
		<a-page-header
		title="Title"
		class="site-page-header"
		sub-title="This is a subtitle"
		:avatar="{ src: 'https://avatars1.githubusercontent.com/u/8186664?s=460&v=4' }"
		:breadcrumb="{ routes }"
		>
		<template #tags>
			<a-tag color="blue">Running</a-tag>
		</template>
		<template #extra>
			<a-button key="3">Operation</a-button>
			<a-button key="2">Operation</a-button>
			<a-button key="1" type="primary">Primary</a-button>
			<a-dropdown key="more">
			<a-button :style="{ border: 'none', padding: 0 }">
				<EllipsisOutlined :style="{ fontSize: '20px', verticalAlign: 'top' }" />
			</a-button>
			<template #overlay>
				<a-menu>
				<a-menu-item>
					<a target="_blank" rel="noopener noreferrer" href="http://www.alipay.com/">
					1st menu item
					</a>
				</a-menu-item>
				<a-menu-item>
					<a target="_blank" rel="noopener noreferrer" href="http://www.taobao.com/">
					2nd menu item
					</a>
				</a-menu-item>
				<a-menu-item>
					<a target="_blank" rel="noopener noreferrer" href="http://www.tmall.com/">
					3rd menu item
					</a>
				</a-menu-item>
				</a-menu>
			</template>
			</a-dropdown>
		</template>
		<a-row class="content">
			<div style="flex: 1">
			<p>
				Ant Design interprets the color system into two levels: a system-level color system and
				a product-level color system.
			</p>
			<p>
				Ant Design&#x27;s design team preferred to design with the HSB color model, which makes
				it easier for designers to have a clear psychological expectation of color when
				adjusting colors, as well as facilitate communication in teams.
			</p>
			<div>
				<template v-for="item in iconLinks" :key="item.src">
				<a class="example-link">
					<img class="example-link-icon" :src="item.src" :alt="item.text" />
					{{ item.text }}
				</a>
				</template>
			</div>
			</div>
			<div class="image">
			<img
				src="https://gw.alipayobjects.com/zos/antfincdn/K%24NnlsB%26hz/pageHeader.svg"
				alt="content"
				style="width: 100%"
			/>
			</div>
		</a-row>
		</a-page-header>
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



		const columns = [
		{
			dataIndex: 'full_name',
			key: 'full_name',
			slots: { title: 'customTitle', customRender: 'name' },
		},
		{
			title: 'EMPID',
			dataIndex: 'emp_id',
			key: 'emp_id',
		},
		{
			title: 'Address',
			dataIndex: 'address',
			key: 'address',
		},
		{
			title: 'email',
			dataIndex: 'email',
			key: 'email',
		},
		{
			title: 'Role',
			key: 'role',
			dataIndex: 'role',
			slots: { customRender: 'tags' },
		},
	];
		const columns2 = [
		{
			dataIndex: 'full_name',
			key: 'full_name',
			slots: { title: 'customTitle', customRender: 'name' },
		},
		{
			title: 'EMPID',
			dataIndex: 'emp_id',
			key: 'emp_id',
		},
		{
			title: 'Address',
			dataIndex: 'address',
			key: 'address',
		},
		{
			title: 'email',
			dataIndex: 'email',
			key: 'email',
		},
		{
			title: 'Role',
			key: 'role',
			dataIndex: 'role',
			slots: { customRender: 'tags' },
		},
		{
			title: 'Action',
			key: 'action',
			slots: { customRender: 'action' },
		},
	];



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
			return {
				form :{
					name:'',
					first_name:'',
					last_name:'',
					email:'',
					web:'',
					city:'',
					NIC:'',
					DOB:'',
					join_date:'',
					designation:'',
					description:'',
					address:'',
					mobile_number:'',
					role:'',
				},
				activeKey: ref('1'),
				labelCol: {
					span: 4,
				},
				wrapperCol: {
					span: 14,
				},
				columns,
				columns2,
				};
		},
		methods:{
			onSubmit() {
				this.$inertia.post(
                route("admin.user.store"),
                this.form,
                {
					onFinish: () => {
                        showAlert(this.$page);
						this.resetForm();
                    }
                }
            );	
			},
			userDelete(id){
				this.$inertia.delete(
                route("admin.user.destroy",{user:id}),
                {
					onFinish: () => {
                        showAlert(this.$page);
						this.resetForm();
                    }
                }
            );	
			},
			resetForm(){
					this.form.name ='';
					this.form.first_name ='';
					this.form.last_name ='';
					this.form.email ='';
					this.form.web ='';
					this.form.city ='';
					this.form.NIC =null;
					this.form.DOB =null;
					this.form.join_date ='';
					this.form.designation ='';
					this.form.description ='';
					this.form.address ='';
					this.form.mobile_number ='';
					this.form.role ='';
				
			},
			onChangeDOB(date , dateString){
				
				this.form.DOB = dateString;
				
			},
			onChangeJoinDate(date , dateString){

				this.form.join_date = dateString;
				
			},
		},
		
	});

</script>

<style lang="scss">
</style>