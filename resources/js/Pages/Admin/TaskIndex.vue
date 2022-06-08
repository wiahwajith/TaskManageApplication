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
						<a-button type="primary" block size="small" :href="$route('admin.project.index')">
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
				v-for="(project , index) in projects.data"
				:key="index"
				:title="project.title"
				class="site-page-header"
				:sub-title="project.assigner"
				:avatar="{ src: 'https://avatars1.githubusercontent.com/u/8186664?s=460&v=4' }"
				:breadcrumb="{ routes }"
				>
				<template #tags>
					<a-tag color="blue">{{ project.status}}</a-tag>
				</template>
				<template #extra>
					<a-button key="1" type="primary" :href="$route('admin.task.show',{task:project.id})">ADD TASK</a-button>
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
						{{ project.description }}
					</p>
					<!-- <p>
						Ant Design&#x27;s design team preferred to design with the HSB color model, which makes
						it easier for designers to have a clear psychological expectation of color when
						adjusting colors, as well as facilitate communication in teams.
					</p> -->
					<div>
						<template v-for="item in iconLinks" :key="item.src">
						<a class="example-link">
							<img class="example-link-icon" :src="item.src" :alt="item.text" />
							{{ item.text }}
						</a>
						</template>
					</div>
					</div>
				</a-row>
				<a-divider />
				</a-page-header>
	
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

	export default ({
		components: {
			AdminDashboard,
			EllipsisOutlined ,
		},
		props: [
			'projects',
		],
		data() {
			return {
				form:{
					title:'',
					description:'',
					assigner_id:'',
					customer_id:'',
					project_status_id: 1,
					progress:0.0,
					project_start_date:'',
					project_end_date:'',
				},
				loading: false,
				visible: false,
				labelCol: { span: 4 },
				wrapperCol: { span: 8 },
				};
		},
		methods:{
			onSubmit() {
				this.$inertia.post(
                route("admin.project.store"),
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
			onDateChange(val){

				this.form.project_start_date = val[0].format('YYYY-MM-DD');
				this.form.project_end_date = val[1].format('YYYY-MM-DD');
			}
		},
		computed: {
			listedClients: function () {
				return this.employers.filter(employer => employer.role == 'Client')
			},
			listedEmployers: function () {
				return this.employers.filter(employer => employer.role != 'Client')
			}
		}
		
	});

</script>

<style lang="scss">
</style>