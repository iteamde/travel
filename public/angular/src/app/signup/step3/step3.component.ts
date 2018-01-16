import { Component, OnInit } from '@angular/core';
import { CountriesService } from '../../../_services/index';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step3',
	templateUrl: './step3.component.html',
	styleUrls: ['./step3.component.scss']
})
export class Step3Component implements OnInit {
	countries = [];
	selected = [1, 6, 9];

	constructor(
		private countriesService: CountriesService
	) { }

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

		this.loadMore();

		// initialize mCustomScrollbar plugin
		var t = this;
		$(".check-block-wrap").mCustomScrollbar({
			callbacks: {
				onTotalScroll: function () { t.loadMore(); }
			}
		});
	}

	select(id) {
		if (this.selected.indexOf(id) >= 0) {
			this.remove(this.selected, id);
		}
		else {
			this.selected.push(id);
		}

		console.log(this.selected);
	}

	remove(array, element) {
		const index = array.indexOf(element);

		if (index !== -1) {
			array.splice(index, 1);
		}
	}

	loadMore(){
		var data1 = {
			query: "",
			limit:20,
			offset:0,
			language_id: 1
		};

		this.countriesService.loadMore(data1)
		.subscribe(
			data => {

				//console.log(data);

				if (data.success) {
					this.countries = JSON.parse(data.data);
					console.log(this.countries);
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
}
