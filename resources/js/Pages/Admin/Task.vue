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
						ADD TASK
					</a-button>
				</a-col>
				<a-col :span="2"></a-col>
			</a-row>
			
		<a-card :title="'View '+project.title +' Project task'" :bordered="false" style="width: 100%; background-color: #eae8e8b0;">
				<div class="components-page-header-demo-content">
				<a-row>
						<a-col :span="8">
							<a-list size="small" bordered >
								<template #header style="">
									<div style="text-align: center;background-color:#ffd666"> <b>TO DO</b> </div>
								</template>
									<template v-for="task in toDotaskList" :key="task.id">
									<a-list-item> </a-list-item>

									<a-card 
										hoverable 
										style="width: 100%"
										class="m-5">

										<template #actions style="height:10px !important">
										<setting-outlined key="setting"  />
										<edit-outlined key="edit" />
										<!-- <ellipsis-outlined key="ellipsis" /> -->
											<a-dropdown key="more">
											<a-button :style="{ border: 'none', padding: 0 }">
												<EllipsisOutlined :style="{ fontSize: '20px', verticalAlign: 'top' }" />
											</a-button>
											<template #overlay>
												<a-menu>
												<a-menu-item style="background-color:#ffd666">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,1)">
													TO DO
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#fff566">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,2)">
													PROGRESS
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#d3f261">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,3)">
													DONE
													</a>
												</a-menu-item>
												</a-menu>
											</template>
											</a-dropdown>
										</template>
										<a-tag v-if=(task.urgent) style="float:right"  color="#f50">URGENT</a-tag> 
										<a-card-meta  :title="task.title" :description="task.description">
										
										<template #avatar >
											<a-avatar src="https://joeschmoe.io/api/v1/random" />
										</template>
										</a-card-meta>
										<br>
										<span class="text-muted"> assigner : {{ task.assigner}} </span>
										<span class="text-muted"> creator : {{ task.creator}} </span><br>
										<span class="text-muted"> ends at : {{ task.task_end_date}} </span>
									</a-card>
									</template>
							</a-list>
						</a-col>
						<a-col :span="8">
							<a-list size="small" bordered >
								<template>
								<a-list-item></a-list-item>
								</template>
								<template #header>
								<div style="text-align: center;background-color:#fff566"> <b>PROGRESS</b> </div>

								</template>

									<template v-for="task in processTaskList" :key="task.id">
									<a-list-item></a-list-item>
									<a-card 
										hoverable 
										style="width: 100%"
										class="m-5">

										<template #actions style="height:10px !important">
										<setting-outlined key="setting"  />
										<edit-outlined key="edit" />
											<a-dropdown key="more">
											<a-button :style="{ border: 'none', padding: 0 }">
												<EllipsisOutlined :style="{ fontSize: '20px', verticalAlign: 'top' }" />
											</a-button>
											<template #overlay>
												<a-menu>
												<a-menu-item style="background-color:#ffd666">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,1)">
													TO DO
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#fff566">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,2)">
													PROGRESS
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#d3f261">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,3)">
													DONE
													</a>
												</a-menu-item>
												</a-menu>
											</template>
											</a-dropdown>
										</template>
										<a-tag v-if=(task.urgent) style="float:right"  color="#f50">URGENT</a-tag> 
										<a-card-meta  :title="task.title" :description="task.description">
										
										<template #avatar >
											<a-avatar src="https://joeschmoe.io/api/v1/random" />
										</template>
										</a-card-meta>
										<br>
										<span class="text-muted"> assigner : {{ task.assigner}} </span>
										<span class="text-muted"> creator : {{ task.creator}} </span><br>
										<span class="text-muted"> ends at : {{ task.task_end_date}} </span>
									</a-card>
									</template>

							</a-list>
						</a-col>
						<a-col :span="8">
							<a-list size="small" bordered>
								<template >
								<a-list-item></a-list-item>
								</template>
								<template #header>
								<div style="text-align: center;background-color:#d3f261"> <b>DONE</b> </div>

								</template>

									<template v-for="task in doneTaskList" :key="task.id">
									<a-list-item></a-list-item>

									<a-card 
										hoverable 
										style="width: 100%"
										class="m-5">

										<template #actions style="height:10px !important">
										<setting-outlined key="setting"  />
										<edit-outlined key="edit" />
											<a-dropdown key="more">
											<a-button :style="{ border: 'none', padding: 0 }">
												<EllipsisOutlined :style="{ fontSize: '20px', verticalAlign: 'top' }" />
											</a-button>
											<template #overlay>
												<a-menu>
												<a-menu-item style="background-color:#ffd666">
													<a target="_blank" 
													rel="noopener noreferrer" 
													@click="updateStatus(task.id,1)">
													TO DO
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#fff566">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,2)">
													PROGRESS
													</a>
												</a-menu-item>
												<a-menu-item style="background-color:#d3f261">
													<a target="_blank" rel="noopener noreferrer" @click="updateStatus(task.id,3)">
													DONE
													</a>
												</a-menu-item>
												</a-menu>
											</template>
											</a-dropdown>
										</template>
										<a-tag v-if=(task.urgent) style="float:right"  color="#f50">URGENT</a-tag> 
										<a-card-meta  :title="task.title" :description="task.description">
										<template #avatar >
											<a-avatar src="https://joeschmoe.io/api/v1/random" />
										</template>
										</a-card-meta>
										<br>
										<span class="text-muted"> assigner : {{ task.assigner}} </span>
										<span class="text-muted"> creator : {{ task.creator}} </span><br>
										<span class="text-muted"> ends at : {{ task.task_end_date}} </span>
									</a-card>
									</template>
							</a-list>
						</a-col>
				</a-row>
				
		<!-- add project model -->
		<a-modal v-model:visible="visible" title="Add New Task" @ok="handleOk" style="width:900px">
				
				<!-- project create form -->
				<a-form :model="formState" :label-col="labelCol" :wrapper-col="wrapperCol" style="width: 500px">
					<a-form-item label="Task Title">
					<a-input v-model:value="form.title" />
					</a-form-item>

					<a-form-item label="Description" name="desc">
						<a-textarea v-model:value="form.description"  />
					</a-form-item>		

					<a-form-item label="Assigner" name="region">
					<a-select v-model:value="form.assigner_id"   placeholder="please select your Project Assigner">
						<a-select-option  
						v-for="(employer , index) in listedEmployers"
						:key="index"
						:value="employer.user_id"
						>
							{{ employer.full_name }} 
						</a-select-option>

					</a-select>
					</a-form-item>

					<a-form-item label="Status" name="region">
					<a-select v-model:value="form.task_status_id"   placeholder="please select your Project Assigner">
						<a-select-option  
						v-for="(state , index) in status"
						:key="index"
						:value="state.id"
						>
							{{ state.name }} 
						</a-select-option>

					</a-select>
					</a-form-item>

					<a-form-item label="Duration" name="region">
						<a-range-picker
						v-model:value="value"
						format="YYYY-MM-DD"
						:disabledDate="disabledDate"
						@Change="onDateChange"
						/>
					</a-form-item>

					<a-form-item label="Priority" name="region">
						<a-checkbox v-model:checked="form.urgent"><a-tag color="#f50">URGENT</a-tag> </a-checkbox>
					</a-form-item>
					
					
				</a-form>

			<template #footer>
				<a-button key="back" @click="handleCancel">Close</a-button>
				<a-button key="submit" type="primary" :loading="loading" @click="onSubmit">Create</a-button>
			</template>
		</a-modal>
			</div>
		</a-card>

	</AdminDashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import AdminDashboard from '../../layouts/AdminDashboard' ;
	import { showAlert ,showNotify } from "../../Utility/Utility";
	import Swal from "sweetalert2";
	import { EllipsisOutlined ,SettingOutlined, EditOutlined  } from '@ant-design/icons-vue';

	let uri = window.location.search.substring(1); 
    let params = new URLSearchParams(uri);

	console.log(params);
	

	export default ({
		components: {
			AdminDashboard,
			EllipsisOutlined,
			SettingOutlined, 
			EditOutlined 
		},		
		props:[
			'project',
			'employers',
			'status',
			'tasks',
		],
		data(){
			return{
				form:{
					title: '',
					description: '',	
					task_start_date: '',	
					task_end_date: ''	,
					project_id: this.project.id ,
					task_status_id: '',	
					assigner_id: '',
					urgent: 0,
				},
				checked: 0,
				loading: false,
				visible: false,
			}
		},
		methods:{
			onSubmit(){
				this.$inertia.post(
                route("admin.task.store"),
                this.form,
                {
					onFinish: () => {
                        showAlert(this.$page);
						this.handleCancel();
						
                    }
                }
            );	
			},
			updateStatus(taskId,stateId){
				this.$inertia.patch(
                route("admin.task.update",taskId),
                {state:stateId},
                {
					onFinish: () => {
						// $message.success('Processing complete!');
                        showNotify(this.$page);
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
	
				this.form.title = '';
				this.form.description = '';
				this.form.task_start_date = '';
				this.form.task_end_date = '';
				this.form.task_status_id = '';
				this.form.assigner_id = '';
			},
			onDateChange(val){

				this.form.task_start_date = val[0].format('YYYY-MM-DD');
				this.form.task_end_date = val[1].format('YYYY-MM-DD');
				console.log(this.form.task_start_date );
				
			}
		},
		computed:{			
			listedEmployers : function () {
				return this.employers.filter(employer => employer.role.name != 'Client')
			},
			toDotaskList : function () {
				return this.tasks.data.filter(task => task.status.name == 'Todo')
			},
			processTaskList : function () {
				return this.tasks.data.filter(task => task.status.name == 'Progress')
			},
			doneTaskList : function () {
				return this.tasks.data.filter(task => task.status.name == 'Done')
			}
		},
		
		
	});

</script>

<style lang="scss">
</style>