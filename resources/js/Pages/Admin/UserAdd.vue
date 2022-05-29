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
				<a-form :model="formState" :label-col="labelCol" :wrapper-col="wrapperCol">
					<a-form-item label="Activity name">
					<a-input v-model:value="formState.name" />
					</a-form-item>
					<a-form-item label="Activity zone">
					<a-select v-model:value="formState.region" placeholder="please select your zone">
						<a-select-option value="shanghai">Zone one</a-select-option>
						<a-select-option value="beijing">Zone two</a-select-option>
					</a-select>
					</a-form-item>
					<a-form-item label="Activity time">
					<a-date-picker
						v-model:value="formState.date1"
						show-time
						type="date"
						placeholder="Pick a date"
						style="width: 100%"
					/>
					</a-form-item>
					<a-form-item label="Instant delivery">
					<a-switch v-model:checked="formState.delivery" />
					</a-form-item>
					<a-form-item label="Activity type">
					<a-checkbox-group v-model:value="formState.type">
						<a-checkbox value="1" name="type">Online</a-checkbox>
						<a-checkbox value="2" name="type">Promotion</a-checkbox>
						<a-checkbox value="3" name="type">Offline</a-checkbox>
					</a-checkbox-group>
					</a-form-item>
					<a-form-item label="Resources">
					<a-radio-group v-model:value="formState.resource">
						<a-radio value="1">Sponsor</a-radio>
						<a-radio value="2">Venue</a-radio>
					</a-radio-group>
					</a-form-item>
					<a-form-item label="Activity form">
					<a-input v-model:value="formState.desc" type="textarea" />
					</a-form-item>
					<a-form-item :wrapper-col="{ span: 14, offset: 4 }">
					<a-button type="primary" @click="onSubmit">Create</a-button>
					<a-button style="margin-left: 10px">Cancel</a-button>
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
		methods:{
		},
		components: {
			Dashboard,
			UserAddOutlined,
			TeamOutlined,
			UserSwitchOutlined,
		},
		data() {
			return {
				formState :{
					name: '',
					region: undefined,
					date1: undefined,
					delivery: false,
					type: [],
					resource: '',
					desc: '',
				},
				activeKey: ref('1'),
				labelCol: {
					span: 4,
				},
				wrapperCol: {
					span: 14,
				},
				};
			}
		
	});

</script>

<style lang="scss">
</style>