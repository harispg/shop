<script>
	import ModalLogin from './ModalLogin';
	export default{
		components: {ModalLogin},
		props: ['article', 'p_user'],
		data() {
			return {
				usersRating: 0,
				avgRating: 0,
				timesRated: 0,
			}
		},
		methods: {
			addStars(elem) {
				let _this = this;
				let rateGiven = $(elem).closest('ul').children('.click').length;
				this.usersRating = rateGiven;
				axios.post('/ratings/'+this.article.id, {rating:rateGiven, _token:$("meta[name='csrf-token']").attr('content')})
				.then(response => {
					_this.avgRating = response.data.avg;
					_this.timesRated = response.data.count;
				})
				.catch(error => {
					if(error.response.data.message == 'Unauthenticated.'){
							Event.$emit('loginRequired');
					 	}else{
					 		alert('Something went wrong');
					 	}
				});
			},

			fillStarsForLoggedInUser(){
				var i=0;
				let usersRating = parseInt(this.usersRating,10);
				if(usersRating){
					$($(".js-rating")).children('li').each(function(){
						if((usersRating-i)>0.5){
							$(this).addClass("g-color-primary click");
							i ++;
						}
					});
				}
			},
		},

			computed: {
				averageRating() {
					return this.timesRated ? 'Average rating: '+this.avgRating : 'Not rated.';
				},
				ratedByUsers(){
					if(this.timesRated > 1){
						return 'Rated by '+this.timesRated+' users.';
					}else{
						return 'Rated by '+this.timesRated+' user.';
					}
				}
			},
			created(){
				this.usersRating = this.article.rating_by_user;
				this.avgRating = this.article.average_rating;
				this.timesRated = this.article.ratings.length;
				Event.$on('loggedIn', function(response) {
				})
			},

			mounted(){
				this.fillStarsForLoggedInUser();
			}
		}
	</script>