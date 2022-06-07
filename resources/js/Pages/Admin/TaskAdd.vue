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
				<a-row>
						<a-col :span="8">
							<a-list size="small" bordered :data-source="data">
								<template #renderItem="{ item }">
								<a-list-item>{{ item }}</a-list-item>
								</template>
								<template #header>
								<div>TO DO</div>
								</template>
							</a-list>
						</a-col>
						<a-col :span="8">
							<a-list size="small" bordered :data-source="data">
								<template #renderItem="{ item }">
								<a-list-item>{{ item }}</a-list-item>
								</template>
								<template #header>
								<div>PROGRESS</div>
								</template>
							</a-list>
						</a-col>
						<a-col :span="8">
							<a-list size="small" bordered :data-source="data">
								<template #renderItem="{ item }">
								<a-list-item>{{ item }}</a-list-item>
								</template>
								<template #header>
								<div>DONE</div>
								</template>
							</a-list>
						</a-col>
				</a-row>
				
		<!-- add project model -->
		<a-modal v-model:visible="visible" title="Add New Project" @ok="handleOk" style="width:900px">
				
				<!-- project create form -->
				<!-- <a-form :model="formState" :label-col="labelCol" :wrapper-col="wrapperCol">
					<a-form-item label="Project Title">
					<a-input v-model:value="form.title" />
					</a-form-item>

					<a-form-item label="Description" name="desc">
						<a-textarea v-model:value="form.description"  />
					</a-form-item>		

					<a-form-item label="Project Assigner" name="region">
					<a-select v-model:value="form.assigner_id"   placeholder="please select your Project Assigner">
						<a-select-option  
						v-for="(employer , index) in listedEmployers"
						:key="index"
						:value="employer.id"
						>
							{{ employer.full_name }}
						</a-select-option>

					</a-select>
					</a-form-item>

					<a-form-item label="Client" name="region">
					<a-select  v-model:value="form.customer_id"  placeholder="please select your client">
						<a-select-option  
						v-for="(client , index) in listedClients"
						:key="index"
						:value="client.id"
						>
							{{ client.full_name }}
						</a-select-option>

					</a-select>
					</a-form-item>

					<a-form-item label="Duration" name="region">
						<a-range-picker
						v-model:value="value"
						format="YYYY-MM-DD"
						:disabledDate="disabledDate"
						@change="onDateChange"
						/>
					</a-form-item>
					
					
				</a-form> -->

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
	import { showAlert } from "../../Utility/Utility";
	import Swal from "sweetalert2";
	import { EllipsisOutlined   } from '@ant-design/icons-vue';

	export default ({
		components: {
			AdminDashboard,
			EllipsisOutlined ,
		},
		data(){
			return{
				loading: false,
				visible: false,
			}
		},
		methods:{
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
		}
		
		
	});

</script>

<style lang="scss">
</style>