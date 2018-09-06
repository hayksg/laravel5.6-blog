@extends('layouts-site/wide')
@section('title', "| Search")

@section('content')     
	<div class="vue-container" v-cloak>

		<form class="mb-4">
			<div class="form-group">
				<input type="text" 
				       class="form-control search-input" 
				       placeholder="What are You looking for?" 
				       v-model.trim="keywords" 
				       v-on:input="inputStarted"
				       v-focus 
				       maxlength="80">
			</div>
		</form>

		<h2 v-if="keywords.length > 0" class="blog-post-title mb-4 title-keywords">
			<strong v-text="title"></strong>
			<span class="highlighted" v-text='`"${keywords}"`'></span>
			<hr>
		</h2>

		<div v-if="loader" class="loader"></div>

		<div v-if="noResultFound && keywords.length > 0" v-text="noResultFound" class="no-results-found"></div>

		<ul v-if="results.length > 0" class="list-group search-results">
            <li v-for="result in results" :key="result.id" class="list-group-item mb-3 li-shadow">
            	<a :href="locationOrigin + '/posts/' + result.id" v-html="highlight(result.title)"></a>
            </li>
        </ul>
        
	</div>
	
	<script>
		Vue.directive('focus', {
		    inserted: function (el) {
		        el.focus()
		    }
		})

		new Vue({
			el: ".vue-container",
			data: {
				title: 'Search results for',
				keywords: '',
      	results: [],
      	noResultFound: '',
      	loader: '',
      	locationOrigin: location.origin
			},
			watch: {
        keywords(after, before) {
        	this.fetch();
        	this.noResultFound = '';
        	this.results = [];

        	if (! this.keywords) {
        		this.loader = false;
        	}
        }
		  },
			methods: {	
				fetch: _.debounce(function () {
					axios.post(this.locationOrigin + '/api/search', { name: this.keywords })
               .then(response => {
                 	if (response.data.length > 0) {
                 		this.results = response.data;
                 		this.noResultFound = '';
                 		this.loader = false;
                 	} else {
                 		this.results = [];
                 		this.noResultFound = 'No results found';
                 		this.loader = false;
                 	}
               })
               .catch(error => {});
			  }, 500),

			  highlight(text) {
				  return text.replace(new RegExp(this.keywords, 'gi'), '<span class="highlighted">$&</span>');
				},

				inputStarted() {
					if (this.keywords) {
        		this.loader = true;
        	}
				}
    	}
		});
	</script>

	<style scoped>
		.highlighted { color: #d00; }
		.li-shadow { box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
		.no-results-found { margin-top: -10px; }
		.title-keywords { overflow: auto; }
		.loader {
			margin-top: -10px;
		    border-radius: 50%;
			border: 10px solid #f3f3f3;
			border-top: 10px solid #428BCA;
			border-bottom: 10px solid #428BCA;
		    width: 60px;
		    height: 60px;
		    -webkit-animation: spin 2s linear infinite; /* Safari */
		    animation: spin 2s linear infinite;
		}

		/* Safari */
		@-webkit-keyframes spin {
		    0% { -webkit-transform: rotate(0deg); }
		    100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		    0% { transform: rotate(0deg); }
		    100% { transform: rotate(360deg); }
		}
	</style>
    
@endsection
