<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<!-- <Dashboard></Dashboard> -->
	<AdminDashboard>
		<a-tabs type="card" v-model:activeKey="activeKey">

		<a-tab-pane key="1">
			<template #tab>
				<span>
					All User
					<TeamOutlined />
				</span>
			</template>
			<div style="background: #ececec; padding: 30px">
				<a-card title="View all Employee" :bordered="false" style="width: 1000px">
				<a-table :columns="columns" :data-source="employers">
					<template #name="{ text }">
					<a>{{ text }}</a>
					</template>
					<template #customTitle>
					<span>
						<smile-outlined />
						Name
					</span>
					</template>
					<template #tags="{ text: tags }">
					<span>
						<a-tag
						v-for="tag in tags"
						:key="tag"
						:color="tag === 'Client' ? 'volcano' : tag.length > 6 ? 'geekblue' : 'green'"
						>
						{{ tag.toUpperCase() }}
						</a-tag>
					</span>
					</template>
				</a-table>
				</a-card>
			</div>
		</a-tab-pane>

		<a-tab-pane key="2">
			<template #tab>
				<span>
					Add User
					<UserAddOutlined />
				</span>
			</template>
		<div style="background: #ececec; padding: 30px">
			<a-card title="Add Employee" :bordered="false" style="width: 1000px">
				<a-form 
					:model="form" 
					:label-col="labelCol" 
					:wrapper-col="wrapperCol"
					>

					<a-form-item label="User Name" :required="true">
					<a-input v-model:value="form.name"/>
					</a-form-item>
					<a-form-item label="First Name">
					<a-input v-model:value="form.first_name" :required="true" />
					</a-form-item>

					<a-form-item label="Last Name">
					<a-input v-model:value="form.last_name" />
					</a-form-item>

					<a-form-item label="email" :required="true">
					<a-input v-model:value="form.email" />
					</a-form-item>

					<a-form-item label="Role" :required="true">
						<a-select v-model:value="form.role" placeholder="please select employer role">
							<a-select-option v-for="(role, key) in roles" :key="key" :value="role.name">{{ role.name }}</a-select-option>

						</a-select>
					</a-form-item>

					<a-form-item label="web">
					<a-input v-model:value="form.web" />
					</a-form-item>

					<a-form-item label="NIC">
					<a-input v-model:value="form.NIC" />
					</a-form-item>

					<a-form-item label="city">
					<a-input v-model:value="form.city" />
					</a-form-item>

					<a-form-item label="mobile Number">
						<a-input v-model:value="form.mobile_number" />
					</a-form-item>


					<a-form-item label="Date Of Birth">
					<a-space direction="vertical">
						<a-date-picker 
						format="YYYY-MM-DD"
						@Change="onChangeDOB"
						/>
					</a-space>
					</a-form-item>

					<a-form-item label="Join Date">
					<a-space direction="vertical">
						<a-date-picker
							format="YYYY-MM-DD"
							@change="onChangeJoinDate"
						/>
					</a-space>
					</a-form-item>

					<a-form-item label="Designation">
						<a-input v-model:value="form.designation" />
					</a-form-item>

					<a-form-item label="Bio" name="desc">
						<a-textarea v-model:value="form.description" />
					</a-form-item>

					<a-form-item label="Address" name="desc">
						<a-textarea v-model:value="form.address" />
					</a-form-item>

					<a-form-item :wrapper-col="{ span: 14, offset: 4 }">
					<a-button type="primary" @click="onSubmit">Add User</a-button>
					<a-button style="margin-left: 10px" @click="resetForm">Reset</a-button>
					</a-form-item>
				</a-form>
			</a-card>
		</div>
		</a-tab-pane>
		<a-tab-pane key="3">
			<template #tab>
				<span>
					Edit User
					<UserSwitchOutlined />
				</span>
			</template>
			<div style="background: #ececec; padding: 30px">
				<a-card title="Edit Employee" :bordered="false" style="width: 1000px">
				<a-table :columns="columns2" :data-source="employers">
					<template #name="{ text }">
					<a>{{ text }}</a>
					</template>
					<template #customTitle>
					<span>
						<smile-outlined />
						Name
					</span>
					</template>
					<template #tags="{ text: tags }">
					<span>
						<a-tag
						v-for="tag in tags"
						:key="tag"
						:color="tag === 'Client' ? 'volcano' : tag.length > 6 ? 'geekblue' : 'green'"
						>
						{{ tag.toUpperCase() }}
						</a-tag>
					</span>
					</template>
					<template #action="{ record }">
					<span>
						<a>Invite 一 {{ record.id }}</a>
						<a-divider type="vertical" />
						<a
						@click="userDelete(record.id)"
						style="color:#ff7a45"
						>Delete</a>
						<a-divider type="vertical" />
						<a class="ant-dropdown-link">
						More actions
						<down-outlined />
						</a>
					</span>
					</template>
				</a-table>
				</a-card>
			</div>
		</a-tab-pane>
	</a-tabs>
		
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
			key: 'tag',
			dataIndex: 'tag',
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
			key: 'tag',
			dataIndex: 'tag',
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