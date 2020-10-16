/* eslint-disable */

const loadGoogleMapsApi = require('load-google-maps-api')
import mapStyle from '../util/mapStyle';

const CONFIG = {
    ELEM: '[google-map]',
};

const Gmap = {
    init() {
        const { ELEM } = CONFIG;

        this.elem = document.querySelector(ELEM);

        if (this.elem) {
            this.pins = JSON.parse(this.elem.dataset.pins);
            console.log('Init Google Map: ', this.pins);
            this.initMap();
        }
    },

    initMap() {
        const elem = this.elem;
        const pins = this.pins;

        loadGoogleMapsApi(
            { 'key': 'AIzaSyDB6amgRAZXs7H65TQeg1w61AIG8-Zn7fk', }
        ).then(function (googleMaps) {

            let map;
            if (pins[1]) {
                map = new googleMaps.Map(elem, {
                    center: {
                        // lat: pins[0]['pin']['lat'],
                        // lng: pins[0]['pin']['lng'],
                        lat: 52.2259526,
                        lng: 21.0123483,
                    },
                    zoom: 14.5,
                    keyboardShortcuts: false,
                    styles: mapStyle,
                });
            }

            else {
                map = new googleMaps.Map(elem, {
                    center: {
                        lat: pins[0]['pin']['lat'],
                        lng: pins[0]['pin']['lng'],
                        // lat: 52.2259526,
                        // lng: 21.0123483,
                    },
                    zoom: 12.5,
                    keyboardShortcuts: false,
                    styles: mapStyle,
                });
            }

            pins.forEach(element => {
                const infoWindow = new google.maps.InfoWindow({
                    content: `<div class="google-map__tooltip">${element.content}</div>`
                });

                const image = element.icon;

                const pin = new googleMaps.Marker({
                    position: {
                        lat: Number(element.pin.lat),
                        lng: Number(element.pin.lng),
                    },
                    map: map,
                    title: element.title,
                    icon: image,
                });

                googleMaps.event.addListener(pin, 'click', function () {
                    infoWindow.open(map, pin);
                });

                console.log(pin);
            });

        }).catch(function (error) {
            console.error(error)
        });
    },
}

export default Gmap;