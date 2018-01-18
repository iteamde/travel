import { Component, OnInit } from '@angular/core';
import { AlertService, UserService, TravelStylesService } from '../../../_services/index';
import { MainComponent } from '../../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step5',
	templateUrl: './step5.component.html',
	styleUrls: ['./step5.component.scss']
})
export class Step5Component implements OnInit {

	defaultCoverImage: string = "http://placehold.it/181x181";
	continueBtnText: string = "Select 5 More";
	loading = false;
	searchQuery: string;
	limit: number;
	offset: number;
	language_id: number;
	styles = [];
	selected = [1, 6, 9];

	constructor(
		private stylesService: TravelStylesService,
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
		this.styles = [
			// { id: "1", name: "Adventurous", cover_image: "http://placehold.it/181x181" },
			// { id: "2", name: "Holiday-themed", cover_image: "http://placehold.it/181x181" },
			// { id: "3", name: "Spiritual", cover_image: "http://placehold.it/181x181" },
			// { id: "4", name: "Solo Travel", cover_image: "http://placehold.it/181x181" },
			// { id: "5", name: "Event-based", cover_image: "http://placehold.it/181x181" },
			// { id: "6", name: "Group Travel", cover_image: "http://placehold.it/181x181" },
			// { id: "7", name: "Nightlife", cover_image: "http://placehold.it/181x181" },
			// { id: "8", name: "Long Tours", cover_image: "http://placehold.it/181x181" },
			// { id: "9", name: "Group Travel", cover_image: "http://placehold.it/181x181" },
			// { id: "10", name: "Nightlife", cover_image: "http://placehold.it/181x181" },
			// { id: "11", name: "Long Tours", cover_image: "http://placehold.it/181x181" }
		];

		this.loadMore();

		// initialize mCustomScrollbar plugin
		var t = this;
		$("#select_styles").mCustomScrollbar({
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
		if (cover_image == undefined || cover_image == "") {
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
			country_id: 1,
		};

		this.stylesService.loadMore(data1)
		.subscribe(
			data => {
				//console.log(data);

				if (data.success) {

					if(replace) {
						this.styles = data.data;
					} else {
						this.styles = this.styles.concat(data.data);
					}

					this.offset = this.offset = this.styles.length;
					// console.log(this.styles);
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

	continueStep5() {
		this.toggleSignup(false);

		var arr = $.map( this.selected, function( n, i ) {
			return {id: n}
		});

		var user: any = {};
		user.user_id = localStorage.getItem('signupId');
		user.travel_styles = arr;

		this.userService.signupStep5(user)
			.subscribe(
			data => {
				//console.log(data);

				if (data.success) {
					var response = data.data;
					//console.log(response);
					this.toggleSignup(true);

					// continue to step 6
					this.mainC.openSignup(6);
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
