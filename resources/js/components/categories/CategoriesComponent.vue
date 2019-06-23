<script>
	import NewCategory from './NewCategory.vue';
	import EditCategory from './EditCategory.vue';
	export default{
		components: {NewCategory, EditCategory},
		data(){
			return  {
				dataSet: {},
				items: [],
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch(){
				axios.get(this.url())
					 .then(this.refresh)
					 .catch(error => console.log(error.response));
			},

			refresh({data}){
				this.dataSet = data;
				this.items = data.data;
			},

			url(){
				return location.pathname;
			},

			photoPath(path){
				return "/" + path;
			},

			deleteRow(item){
				axios.post('/categories/'+item.name, {_method: 'DELETE'})
					 .then(this.removeRow(item));
			},

			removeRow(item){
				let reducedItems = this.items.filter(function(elem){
					return elem.id!=item.id;
				});
				this.items = reducedItems;
			},

			updateItems(category){
				console.log('haris');
				this.items = this.items.map(item => item.id===category.id ? category: item);
			}
		}
	}
</script>