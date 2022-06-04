<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<!-- <Dashboard></Dashboard> -->
	<AdminDashboard>
			<a-row>
				<a-col :span="6"></a-col>
				<a-col :span="6"></a-col>
				<a-col :span="4"></a-col>
				<a-col :span="6">
						<a-button type="primary" block size="small" @click="showModal">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
						<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
						</svg>
						ADD PROJECT
					</a-button>
				</a-col>
				<a-col :span="2"></a-col>

			</a-row>
			
		<a-card title="View all Projects" :bordered="false" style="width: 1000px">
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
		<!-- add project model -->
		<a-modal v-model:visible="visible" title="Title" @ok="handleOk">
			<template #footer>
				<a-button key="back" @click="handleCancel">Return</a-button>
				<a-button key="submit" type="primary" :loading="loading" @click="handleOk">Submit</a-button>
			</template>
			<p>Some contents...</p>
			<p>Some contents...</p>
			<p>Some contents...</p>
			<p>Some contents...</p>
			<p>Some contents...</p>
		</a-modal>
			</div>
		</a-card>
		
		
	</AdminDashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import AdminDashboard from '../../layouts/AdminDashboard' ;
	import { showAlert } from "../../Utility/Utility";
	import Swal from "sweetalert2";
	import { EllipsisOutlined   } from '@ant-design/icons-vue';
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
			EllipsisOutlined ,
		},
		props: [
			'employers',
			'roles',
		],
		data() {
			return {
				loading: false,
				visible: false,
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
			showModal() {
			this.visible = true;
			},
			handleOk(e) {
			this.loading = true;
			setTimeout(() => {
				this.visible = false;
				this.loading = false;
			}, 3000);
			},
			handleCancel(e) {
			this.visible = false;
			},
		},
		
	});

</script>

<style lang="scss">
</style>