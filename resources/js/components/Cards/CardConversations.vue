<template>

	<!-- Conversations Card -->
	<a-card :bordered="false" class="header-solid h-full" :bodyStyle="{paddingTop: 0, paddingBottom: '16px' }">
		<template #title>
			<h6 class="font-semibold m-0">Conversations</h6>
		</template>
		<a-list
			class="conversations-list"
			item-layout="horizontal"
			:split="false"
			:data-source="data"
		>
			<a-list-item v-for="(item , key) in data">
				<a-button>
					REPLY
				</a-button>
				<a-list-item-meta
					:title="item.title"
					:description="item.code"
				>
					<a-avatar
					
					:size="48"
					shape="square"
					:src="item.avatar"
					/>
				</a-list-item-meta>
			</a-list-item>
		</a-list>
	</a-card>
	<!-- / Conversations Card -->

</template>

<script>

	export default ({
		props: {
			data: {
				type: Array,
				default: () => [],
			},
		},
		data() {
			return {
			}
		},
	})

</script>