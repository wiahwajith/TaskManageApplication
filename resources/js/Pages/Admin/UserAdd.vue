<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<!-- <Dashboard></Dashboard> -->
	<Dashboard>
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
				view all user 
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
					<a-input v-model:value="form.first_name" />
					</a-form-item>

					<a-form-item label="Last Name">
					<a-input v-model:value="form.last_name" />
					</a-form-item>

					<a-form-item label="email" :required="true">
					<a-input v-model:value="form.email" />
					</a-form-item>

					<a-form-item label="Role">
						<a-select v-model:value="form.role" placeholder="please select employer role">
							<a-select-option v-for="(role, key) in roles" :key="key" value="">{{ role}}</a-select-option>
							<a-select-option value="beijing">Zone two</a-select-option>
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
						<a-date-picker v-model:value="form.DOB" />
					</a-space>
					</a-form-item>

					<a-form-item label="Join Date">
					<a-space direction="vertical">
						<a-date-picker v-model:value="form.join_date" />
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
				Edit user 
				</a-card>
			</div>
		</a-tab-pane>
	</a-tabs>
		
	</Dashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import Dashboard from '../../layouts/Dashboard';
	import { UserSwitchOutlined, TeamOutlined, UserAddOutlined } from '@ant-design/icons-vue';
	import { ref } from 'vue';

	export default ({
		components: {
			Dashboard,
			UserAddOutlined,
			TeamOutlined,
			UserSwitchOutlined,
		},
		props: [
			'users',
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
					emp_id:'',
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
                    }
                }
            );	
			},
			resetForm(e){
				e.target.reset();
			}
		},
		
	});

</script>

<style lang="scss">
</style>