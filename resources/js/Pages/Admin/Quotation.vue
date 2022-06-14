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
				<a-typography-title	:level="2">{{ company.name }}</a-typography-title>
			
			</a-col>
			<a-col :span="8"></a-col>
			<a-col :span="8">
				<p>Date : {{ }}</p>
				<p>Quote No: <b>#{{ quotation.number}}</b> </p>
				<div>
					<a-date-picker 
					@change="setVladDate"
					format="YYYY-MM-DD"  />
				</div>
			</a-col>
		</a-row>
		<a-row>
			<a-col :span="8">
				<p>Address:</p>
				<p>{{ company.address}}</p>
				<p>{{ company.city}}</p>
				<p>{{ company.web}}.</p>
				<p>{{ company.email}}.</p>
				<p>Tel:{{ company.contact_number}}</p>
			</a-col>
			<a-col :span="8"></a-col>
			<a-col :span="8">
				<div >
					<a-select  
						v-model:value="QuotationForm.client"
						placeholder="please select your client"
						style="width:150px; margin-top: 10px;">
						<a-select-option  
						v-for="(client , index) in listedClients"
						:key="index"
						:value="client.user_id"
						>
						{{ client.full_name }}
						</a-select-option>
					</a-select>
				</div>
			</a-col>
		</a-row>

		<a-table :columns="columns" :row-key="record => record.key" :data-source="quotation.products">
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
				<h6 class="total-value"> TOTAL : <u> {{ totalPrice }} LKR</u></h6>

				<a-button type="primary" block size="small" @click="submitQuotation">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9 2C8.44772 2 8 2.44772 8 3C8 3.55228 8.44772 4 9 4H11C11.5523 4 12 3.55228 12 3C12 2.44772 11.5523 2 11 2H9Z" fill="#111827"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C4 3.89543 4.89543 3 6 3C6 4.65685 7.34315 6 9 6H11C12.6569 6 14 4.65685 14 3C15.1046 3 16 3.89543 16 5V16C16 17.1046 15.1046 18 14 18H6C4.89543 18 4 17.1046 4 16V5ZM7 9C6.44772 9 6 9.44772 6 10C6 10.5523 6.44772 11 7 11H7.01C7.56228 11 8.01 10.5523 8.01 10C8.01 9.44772 7.56228 9 7.01 9H7ZM10 9C9.44772 9 9 9.44772 9 10C9 10.5523 9.44772 11 10 11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H10ZM7 13C6.44772 13 6 13.4477 6 14C6 14.5523 6.44772 15 7 15H7.01C7.56228 15 8.01 14.5523 8.01 14C8.01 13.4477 7.56228 13 7.01 13H7ZM10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15H13C13.5523 15 14 14.5523 14 14C14 13.4477 13.5523 13 13 13H10Z" fill="#111827"/>
							</svg>
						CREATE Quotation
					</a-button>

			</a-col>
		</a-row>

		</a-card>
	</div>


	<!-- product modal -->
	<div>
		<a-modal v-model:visible="visible" width="1000px" title="Add Product" @ok="submitProduct">
				<a-form :model="updateForm" 
				:label-col="labelCol" 
				:wrapper-col="wrapperCol"
				style="width:500px"
				>
					<a-form-item label="Code">
					<a-input v-model:value="productForm.code" />
					</a-form-item>

					<a-form-item label="Name   " name="desc">
						<a-input v-model:value="productForm.name"  />
					</a-form-item>		
					<a-form-item label="Description" name="desc">
						<a-textarea v-model:value="productForm.description"  />
					</a-form-item>	

					<a-form-item label="Cost" name="desc">
						<a-input v-model:value="productForm.cost"  style="width:"/>
					</a-form-item>		

					<a-form-item label="Assigners" name="region">
					<a-select  v-model:value="productForm.assigner_id"  placeholder="please select your client">
						<a-select-option  
						v-for="(employer , index) in listedEmployees"
						:key="index"
						:value="employer.user_id"
						>
							{{ employer.full_name }}
						</a-select-option>

					</a-select>
					</a-form-item>

					<a-form-item label="Service Type" name="region">
					<a-select  v-model:value="productForm.product_type_id"  placeholder="please select your client">
						<a-select-option  
						v-for="(type , index) in productTypes"
						:key="index"
						:value="type.id"
						>
							{{ type.name }}
						</a-select-option>

					</a-select>
					</a-form-item>
					
					<a-form-item label="Valid Date" name="region">
						<a-date-picker 
						@change="setProductDate"
						format="YYYY-MM-DD" />
					</a-form-item>
					
				</a-form>
		</a-modal>
	</div>

	</AdminDashboard>
</template>

<script>
	// This is the dashboard page, it uses the dashboard layout in: 
	import AdminDashboard from '../../layouts/AdminDashboard' ;
	import { showNotify , showAlert} from "../../Utility/Utility";
	import Swal from "sweetalert2";
	import { message } from 'ant-design-vue';

	import { PlusCircleFilled } from '@ant-design/icons-vue';

	const columns  = [
	{
		title: 'No',
		dataIndex: 'id',
		key: 'index',
		render : (text, record, index) => index,
	},
	{
		title: 'code',
		dataIndex: 'code',
		key: 'code',
	},
	{
		title: 'Product Name',
		dataIndex: 'name',
		key: 'name',
	},
	{
		title: 'Service Type',
		dataIndex:[ 'product_type','name'],
		key: [ 'product_type','name'],
		responsive: ['md'],
	},
	{
		title: 'Assigner',
		dataIndex: ['assigner','name'],
		key: ['assigner','name'],
		responsive: ['lg'],
	},
	{
		title: 'Cost',
		dataIndex: 'cost',
		key: 'cost',
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
			message,
		},
		props: [
			'quotation',
			'company',
			'users',
			'productTypes',
		],
		data() {
			return {
				QuotationForm:{
					client:'',
					valid_date:'',
				},
				productForm:{
					code : '22PRO',
					name : '',
					description : '',
					cost : 0.00,
					quotation_id : this.quotation.id,
					assigner_id :'' ,
					product_type_id : '',
					valid_date : '',
				},
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
			notification(str){
				message.loading({ content: 'Loading...', key });
				setTimeout(() => {
				message.success({ content: str, key, duration: 2 });
				}, 1000);
			},
			submitProduct(){
				this.handleOk();
				this.$inertia.post(
                route("admin.product.store"),
                this.productForm,
                {
					onFinish: () => {
						this.handleCancel();
                        showNotify(this.$page);
						// this.notification('Product added!');
                    }
                }
            );	
			},
			submitQuotation(){
				this.$inertia.patch(
                route("admin.quotation.update",{quotation: this.quotation.id,}),
                this.QuotationForm,
                {
					onFinish: () => {

                        showAlert(this.$page);
						this.$router.push({ name: 'admin.quotation.index' });
                    }
                }
            );	
			},
			setProductDate(val){
				this.productForm.valid_date = val.format('YYYY-MM-DD');

			},
			setVladDate(val){
				this.QuotationForm.valid_date = val.format('YYYY-MM-DD');

			}
		},
		computed: {
			listedClients: function () {
				return this.users.filter(user => user.role == 'Client')
			},
			listedEmployees: function () {
				return this.users.filter(user => user.role != 'Client')
			},
			totalPrice: function () {
				return  this.quotation.products.reduce((sum,item) => sum + item.cost, 0);
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