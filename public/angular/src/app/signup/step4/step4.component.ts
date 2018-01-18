import { Component, OnInit } from '@angular/core';
import { AlertService, UserService, PlacesService } from '../../../_services/index';
import { MainComponent } from '../../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step4',
	templateUrl: './step4.component.html',
	styleUrls: ['./step4.component.scss']
})
export class Step4Component implements OnInit {

	defaultCoverImage: string = "http://placehold.it/181x181";
	continueBtnText: string = "Select 5 More";
	loading = false;
	searchQuery: string;
	limit: number;
	offset: number;
	language_id: number;
	places = [];
	selected = [1, 6, 9];

	constructor(
		private placesService: PlacesService,
		private userService: UserService,
		private mainC: MainComponent
	) {
		this.searchQuery = "";
		this.limit = 20;
		this.offset = 0;
		this.language_id = 1;
	}

	ngOnInit() {

		this.selected = [];
		this.places = [
			// { id: "1", name: "Eiffel Tower", city_country_name:"Paris, France", cover_image: "http://placehold.it/181x181" },
			// { id: "2", name: "Seine River", city_country_name:"France", cover_image: "http://placehold.it/181x181" },
			// { id: "3", name: "Ouzoud Falls", city_country_name:"Morocco", cover_image: "http://placehold.it/181x181" },
			// { id: "4", name: "Hassan Tower", city_country_name:"Rabat, Morocco", cover_image: "http://placehold.it/181x181" },
			// { id: "5", name: "Marrakech Museum", city_country_name:"Marrakesh, Morocco", cover_image: "http://placehold.it/181x181" },
			// { id: "6", name: "Walt Disney World", city_country_name:"Florida, United States", cover_image: "http://placehold.it/181x181" },
			// { id: "7", name: "Central Park", city_country_name:"New York, United States", cover_image: "http://placehold.it/181x181" },
			// { id: "8", name: "Fushimi Inari-taisha", city_country_name:"Kyoto, Japan", cover_image: "http://placehold.it/181x181" },
			// { id: "9", name: "Walt Disney World", city_country_name="Florida, United States", cover_image: "http://placehold.it/181x181" },
			// { id: "10", name: "Central Park", city_country_name:"New York, United States", cover_image: "http://placehold.it/181x181" },
			// { id: "11", name: "Fushimi Inari-taisha", city_country_name:"Kyoto, Japan", cover_image: "http://placehold.it/181x181" }
		];

		this.loadMore();

		// initialize mCustomScrollbar plugin
		var t = this;
		$("#select_places").mCustomScrollbar({
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

		if (this.selected.length < 5) {
			this.continueBtnText = "Select " + (5 - this.selected.length) + " More";
		}
		else {
			this.continueBtnText = "Continue";
		}
		//console.log(this.selected);
	}

	getCoverImage(cover_image) {
		if (cover_image == "") {
			return this.defaultCoverImage;
		}
		return cover_image;
	}

	search() {
		if (this.searchQuery.length % 3 == 0) {
			this.offset = 0;
			this.loadMore(true);
		}
	}

	loadMore(replace = false) {
		var data1 = {
			query: this.searchQuery,
			limit: this.limit,
			offset: this.offset,
			language_id: this.language_id,
		};

		this.placesService.loadMore(data1)
		.subscribe(
			data => {
				//console.log(data);

				if (data.success) {
					if(replace) {
						this.places = data.data;
					} else {
						this.places = this.places.concat(data.data);
					}

					this.offset = this.offset = this.places.length;
					// console.log(this.places);
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

	continueStep4() {
		this.toggleSignup(false);

		var arr = $.map( this.selected, function( n, i ) {
			return {id: n}
		});

		var user: any = {};
		user.user_id = localStorage.getItem('signupId');
		user.places = arr;

		this.userService.signupStep4(user)
			.subscribe(
			data => {
				//console.log(data);

				if (data.success) {
					var response = data.data;
					//console.log(response);
					this.toggleSignup(true);

					// continue to step 5
					this.mainC.openSignup(5);
				}
				else {
					this.toggleSignup(true);
				}
			},
			error => {
				console.log(error);
				//this.alertService.error(error);
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
