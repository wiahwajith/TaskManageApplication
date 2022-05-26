<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>
	<!-- <Dashboard></Dashboard> -->
	<Dashboard>
		<div>
			<a-row>
				<a-col :span="6"></a-col>
				<a-col :span="6"></a-col>
				<a-col :span="4"></a-col>
				<a-col :span="6">
						<a-button type="primary" block size="small" @click="showModal">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
						<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
						</svg>
						ADD EVENT
					</a-button>
				</a-col>
				<a-col :span="2"></a-col>
			</a-row>

			<a-calendar v-model:value="value" class="mr-10">
				<template #dateCellRender="{ current: value }">
				<ul class="events">
					<li v-for="item in getListData(value)" :key="item.content">
					<a-badge :status="item.type" :text="item.content" />
					</li>
				</ul>
				</template>
				<template #monthCellRender="{ current: value }">
				<div v-if="getMonthData(value)" class="notes-month">
					<section>{{ getMonthData(value) }}</section>
					<span>Backlog number</span>
				</div>
				</template>
			</a-calendar>

		</div>

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

	</Dashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import Dashboard from '../../layouts/Dashboard';
	// "Projects" table component.
	import CardProjectTable from '../../components/Cards/CardProjectTable' ;

	

	export default ({
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
			getListData(value) {
			let listData;
			switch (value.date()) {
				case 8:
				listData = [
					{ type: 'warning', content: 'This is warning event.' },
					{ type: 'success', content: 'This is usual event.' },
				];
				break;
				case 10:
				listData = [
					{ type: 'warning', content: 'This is warning event.' },
					{ type: 'success', content: 'This is usual event.' },
					{ type: 'error', content: 'This is error event.' },
				];
				break;
				case 15:
				listData = [
					{ type: 'warning', content: 'This is warning event' },
					{ type: 'success', content: 'This is very long usual event。。....' },
					{ type: 'error', content: 'This is error event 1.' },
					{ type: 'error', content: 'This is error event 2.' },
					{ type: 'error', content: 'This is error event 3.' },
					{ type: 'error', content: 'This is error event 4.' },
				];
				break;
				default:
			}
			return listData || [];
			},

			getMonthData(value) {
			if (value.month() === 8) {
				return 1394;
			}
			},
		},
		components: {
			Dashboard,
			CardProjectTable,
		},

		data() {
			return {
				loading: false,
				visible: false,

			}
		},
	})

</script>

<style scoped>
.events {
	list-style: none;
	margin: 0;
	padding: 0;
}
.events .ant-badge-status {
	overflow: hidden;
	white-space: nowrap;
	width: 100%;
	text-overflow: ellipsis;
	font-size: 12px;
}
.notes-month {
	text-align: center;
	font-size: 28px;
}
.notes-month section {
	font-size: 28px;
}
</style>