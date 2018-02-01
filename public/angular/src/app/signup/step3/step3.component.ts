import { Component, OnInit } from '@angular/core';
import { UserService, CountriesService } from '../../../_services/index';
import { MainComponent } from '../../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step3',
	templateUrl: './step3.component.html',
	styleUrls: ['./step3.component.scss']
})
export class Step3Component implements OnInit {
	defaultCoverImage: string = "http://placehold.it/181x181";
	continueBtnText: string = "Select 5 More";
	signupSteps = 0;
	loading = false;
	searchQuery: string;
	limit: number;
	offset: number;
	language_id: number;
	countries = [];
	selected = [];

	constructor(
		private countriesService: CountriesService,
		private userService: UserService,
		private mainC: MainComponent
	) { 
		this.searchQuery = "";
		this.limit = 20;
		this.offset = 0;
		this.language_id = 1;
		this.signupSteps = mainC.signupSteps;
	}

	ngOnInit() {

		this.selected = [];
		this.countries = [
			// { id: "1", name: "Japan", cover_image: "http://placehold.it/181x181" },
			// { id: "2", name: "United States", cover_image: "http://placehold.it/181x181" },
			// { id: "3", name: "North Africa", cover_image: "http://placehold.it/181x181", flag: "./assets/image/flag-img-1.png" },
			// { id: "4", name: "France", cover_image: "http://placehold.it/181x181" },
			// { id: "5", name: "Germany", cover_image: "http://placehold.it/181x181" },
			// { id: "6", name: "North America", cover_image: "http://placehold.it/181x181", flag: "./assets/image/flag-img-2.png" },
			// { id: "7", name: "United States", cover_image: "http://placehold.it/181x181" },
			// { id: "8", name: "Morocco", cover_image: "http://placehold.it/181x181" },
			// { id: "9", name: "North America", cover_image: "http://placehold.it/181x181", flag: "./assets/image/flag-img-2.png" },
			// { id: "10", name: "United States", cover_image: "http://placehold.it/181x181" },
			// { id: "11", name: "Morocco", cover_image: "http://placehold.it/181x181" }
		];

		$('#signUpStep3').modal("show");

		this.loadMore();

		// initialize mCustomScrollbar plugin
		var t = this;
		$("#select_countries").mCustomScrollbar({
			callbacks: {
				onTotalScroll: function () { t.loadMore(); }
			}
		});
	}

	select(id) {
		if (this.selected.indexOf(id) >= 0) {
			const index = this.selected.indexOf(id);

			if (index !== -1) {
				this.selected.splice(index, 1);
			}
		}
		else {
			this.selected.push(id);
		}

		if(this.selected.length < 5)
		{
			this.continueBtnText = "Select "+ (5 - this.selected.length) +" More";
		}
		else{
			this.continueBtnText = "Continue";
		}
		// console.log(this.selected);
	}

	getCoverImage(cover_image) {
		if(cover_image == "")
		{
			return this.defaultCoverImage;
		}
		return cover_image;
	}

	search(){
		if(this.searchQuery.length > 2)
		{
			this.offset = 0;
			this.loadMore(true);
		}
	}

	loadMore(replace = false){
		var data1 = {
			query: this.searchQuery,
			limit: this.limit,
			offset: this.offset,
			language_id: this.language_id
		};

		this.countriesService.loadMore(data1)
		.subscribe(
			data => {
				//console.log(data);

				if (data.success) {

					if(replace) {
						this.countries = data.data;
					} else {
						this.countries = this.countries.concat(data.data);
					}
					
					this.offset = this.offset = this.countries.length;
					// console.log(this.countries);
				}
				else {
					// api error
				}
			},
			error => {
				console.log(error);
			}
		);
	}

	continueStep3() {
		this.toggleSignup(false);

		var arr = $.map( this.selected, function( n, i ) {
			return {id: n}
		});

		var user: any = {};
		user.user_id = localStorage.getItem('signupId');
		user.countries = arr;

		this.userService.signupStep3(user)
			.subscribe(
			data => {
				//console.log(data);

				if (data.success) {
					var response = data.data;
					//console.log(response);
					this.toggleSignup(true);

					// continue to step 4
					this.mainC.openSignup(4);
				}
				else {
					this.toggleSignup(true);
				}
			},
			error => {
				console.log(error);
				this.toggleSignup(true);
			}
		);
	}

	toggleSignup(state) {
		if (state) {
			this.continueBtnText = "Continue";
			this.loading = false;
		}
		else {
			this.continueBtnText = "Saving ...";
			this.loading = true;
		}
	}
}
