<!-- 
	This is the dashboard page, it uses the dashboard layout in: 
	"./layouts/Dashboard.vue" .
 -->

<template>

	<AdminDashboard>

		
	<div style="background: #ececec; padding: 30px">
		<a-card title="Create Quotation" :bordered="false" style="width:100%">
		<a-row>
			<a-col :span="8">
				<a-typography-title	:level="2">Company name</a-typography-title>
			
			</a-col>
			<a-col :span="8"></a-col>
			<a-col :span="8">
				<p>Date : 2022-06-09</p>
				<p>Quote No: #12005</p>
				<p>Exe Date : 2022-06-09</p>
			</a-col>
		</a-row>
		<a-row>
			<a-col :span="8">
				<p>Address:</p>
				<p>196/A company Address,</p>
				<p>Katudebbda,</p>
				<p>colombo.</p>
				<p>Tel:0415617923.</p>
			</a-col>
			<a-col :span="8"></a-col>
			<a-col :span="8">
				<p>To:</p>
				<p>196/A company Address,</p>
				<p>Katudebbda,</p>
				<p>colombo.</p>
				<p>Tel:0415617923.</p>
			</a-col>
		</a-row>

		<a-table :columns="columns" :row-key="record => record.key" :data-source="data">
			<template #bodyCell="{ column, record }">
			<template v-if="column.key === 'name'">
				<a>
				{{ record.name }}
				</a>
			</template>
			</template>
		</a-table>

		<div class="ml-15"  @click="showModal" >
			<PlusCircleFilled style="font-size:35px; color:#40a9ff" />
		</div>

		<a-row>
			<a-col :span="8"></a-col>
			<a-col :span="8"></a-col>
			<a-col :span="8">
				<p> Sub Total: <u> 2586 LKR</u></p>
				<p> Tax : <u> 2586 LKR</u></p>
				<h6 class="total-value"> TOTAL : <u> 2586 LKR</u></h6>

			</a-col>
		</a-row>

		</a-card>
	</div>

	<div>
		<a-modal v-model:visible="visible" width="1000px" title="Basic Modal" @ok="handleOk">
		<p>Some contents...</p>
		<p>Some contents...</p>
		<p>Some contents...</p>
		</a-modal>
	</div>

	</AdminDashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import AdminDashboard from '../../layouts/AdminDashboard' ;
	import { showAlert } from "../../Utility/Utility";
	import Swal from "sweetalert2";

	import { PlusCircleFilled } from '@ant-design/icons-vue';
	import { ref } from 'vue';

	const columns  = [
	{
		title: 'Name (all screens)',
		dataIndex: 'name',
		key: 'name',
	},
	{
		title: 'Age (medium screen or bigger)',
		dataIndex: 'age',
		key: 'age',
		responsive: ['md'],
	},
	{
		title: 'Address (large screen or bigger)',
		dataIndex: 'address',
		key: 'address',
		responsive: ['lg'],
	},
	];

	const data = [
	{
		key: '1',
		name: 'John Brown',
		age: 32,
		address: 'New York No. 1 Lake Park',
	},
	{
		key: '2',
		name: 'Johny deep',
		age: 32,
		address: 'New York No. 1 Lake Park',
	},
	];




	export default ({
		components: {
			AdminDashboard,
			PlusCircleFilled,
		},
		props: [
			'quotation',
		],
		data() {
			return {
				loading : false,
				visible : false,
				columns,
				data,
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
			}, 3000);
			},
			handleCancel(e) {
			this.visible = false;
			},
		}
		
	});

</script>

<style lang="scss">
	.ant-table-thead .ant-table-cell {
		background-color: #40a9ff;
		color:black;
	}
	.total-value  {
		background-color: #40a9ff;
	}
	.ant-modal-content{
		margin-left: 200px;
	}
</style>