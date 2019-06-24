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
			fetch(page){
				axios.get(this.url(page))
					 .then(this.refresh)
					 .catch(error => console.log(error.response));
			},

			refresh({data}){
				this.dataSet = data;
				this.items = data.data;
			},

			url(page){
				if(! page){
					let query = location.search.match(/page=(\d+)/);
					page = query ? query[1] : 1;
				}
				return location.pathname+'?page='+page;
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

			removeItem(category){
				this.items = this.items.map(item => item.id===category.id ? category: item);
			},

			addItem(category){
				this.items.unshift(category);
			}
		}
	}
</script>