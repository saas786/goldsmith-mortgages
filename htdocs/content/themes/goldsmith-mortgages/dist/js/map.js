/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@googlemaps/js-api-loader/dist/index.esm.js":
/*!******************************************************************!*\
  !*** ./node_modules/@googlemaps/js-api-loader/dist/index.esm.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "DEFAULT_ID": () => (/* binding */ DEFAULT_ID),
/* harmony export */   "Loader": () => (/* binding */ Loader)
/* harmony export */ });
// do not edit .js files directly - edit src/index.jst



var fastDeepEqual = function equal(a, b) {
  if (a === b) return true;

  if (a && b && typeof a == 'object' && typeof b == 'object') {
    if (a.constructor !== b.constructor) return false;

    var length, i, keys;
    if (Array.isArray(a)) {
      length = a.length;
      if (length != b.length) return false;
      for (i = length; i-- !== 0;)
        if (!equal(a[i], b[i])) return false;
      return true;
    }



    if (a.constructor === RegExp) return a.source === b.source && a.flags === b.flags;
    if (a.valueOf !== Object.prototype.valueOf) return a.valueOf() === b.valueOf();
    if (a.toString !== Object.prototype.toString) return a.toString() === b.toString();

    keys = Object.keys(a);
    length = keys.length;
    if (length !== Object.keys(b).length) return false;

    for (i = length; i-- !== 0;)
      if (!Object.prototype.hasOwnProperty.call(b, keys[i])) return false;

    for (i = length; i-- !== 0;) {
      var key = keys[i];

      if (!equal(a[key], b[key])) return false;
    }

    return true;
  }

  // true if both NaN, false otherwise
  return a!==a && b!==b;
};

/**
 * Copyright 2019 Google LLC. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at.
 *
 *      Http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const DEFAULT_ID = "__googleMapsScriptId";
/**
 * [[Loader]] makes it easier to add Google Maps JavaScript API to your application
 * dynamically using
 * [Promises](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise).
 * It works by dynamically creating and appending a script node to the the
 * document head and wrapping the callback function so as to return a promise.
 *
 * ```
 * const loader = new Loader({
 *   apiKey: "",
 *   version: "weekly",
 *   libraries: ["places"]
 * });
 *
 * loader.load().then(() => {
 *   const map = new google.maps.Map(...)
 * })
 * ```
 */
class Loader {
    /**
     * Creates an instance of Loader using [[LoaderOptions]]. No defaults are set
     * using this library, instead the defaults are set by the Google Maps
     * JavaScript API server.
     *
     * ```
     * const loader = Loader({apiKey, version: 'weekly', libraries: ['places']});
     * ```
     */
    constructor({ apiKey, channel, client, id = DEFAULT_ID, libraries = [], language, region, version, mapIds, nonce, retries = 3, url = "https://maps.googleapis.com/maps/api/js", }) {
        this.CALLBACK = "__googleMapsCallback";
        this.callbacks = [];
        this.done = false;
        this.loading = false;
        this.errors = [];
        this.version = version;
        this.apiKey = apiKey;
        this.channel = channel;
        this.client = client;
        this.id = id || DEFAULT_ID; // Do not allow empty string
        this.libraries = libraries;
        this.language = language;
        this.region = region;
        this.mapIds = mapIds;
        this.nonce = nonce;
        this.retries = retries;
        this.url = url;
        if (Loader.instance) {
            if (!fastDeepEqual(this.options, Loader.instance.options)) {
                throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== ${JSON.stringify(Loader.instance.options)}`);
            }
            return Loader.instance;
        }
        Loader.instance = this;
    }
    get options() {
        return {
            version: this.version,
            apiKey: this.apiKey,
            channel: this.channel,
            client: this.client,
            id: this.id,
            libraries: this.libraries,
            language: this.language,
            region: this.region,
            mapIds: this.mapIds,
            nonce: this.nonce,
            url: this.url,
        };
    }
    get failed() {
        return this.done && !this.loading && this.errors.length >= this.retries + 1;
    }
    /**
     * CreateUrl returns the Google Maps JavaScript API script url given the [[LoaderOptions]].
     *
     * @ignore
     */
    createUrl() {
        let url = this.url;
        url += `?callback=${this.CALLBACK}`;
        if (this.apiKey) {
            url += `&key=${this.apiKey}`;
        }
        if (this.channel) {
            url += `&channel=${this.channel}`;
        }
        if (this.client) {
            url += `&client=${this.client}`;
        }
        if (this.libraries.length > 0) {
            url += `&libraries=${this.libraries.join(",")}`;
        }
        if (this.language) {
            url += `&language=${this.language}`;
        }
        if (this.region) {
            url += `&region=${this.region}`;
        }
        if (this.version) {
            url += `&v=${this.version}`;
        }
        if (this.mapIds) {
            url += `&map_ids=${this.mapIds.join(",")}`;
        }
        return url;
    }
    /**
     * Load the Google Maps JavaScript API script and return a Promise.
     */
    load() {
        return this.loadPromise();
    }
    /**
     * Load the Google Maps JavaScript API script and return a Promise.
     *
     * @ignore
     */
    loadPromise() {
        return new Promise((resolve, reject) => {
            this.loadCallback((err) => {
                if (!err) {
                    resolve();
                }
                else {
                    reject(err);
                }
            });
        });
    }
    /**
     * Load the Google Maps JavaScript API script with a callback.
     */
    loadCallback(fn) {
        this.callbacks.push(fn);
        this.execute();
    }
    /**
     * Set the script on document.
     */
    setScript() {
        if (document.getElementById(this.id)) {
            // TODO wrap onerror callback for cases where the script was loaded elsewhere
            this.callback();
            return;
        }
        const url = this.createUrl();
        const script = document.createElement("script");
        script.id = this.id;
        script.type = "text/javascript";
        script.src = url;
        script.onerror = this.loadErrorCallback.bind(this);
        script.defer = true;
        script.async = true;
        if (this.nonce) {
            script.nonce = this.nonce;
        }
        document.head.appendChild(script);
    }
    deleteScript() {
        const script = document.getElementById(this.id);
        if (script) {
            script.remove();
        }
    }
    /**
     * Reset the loader state.
     */
    reset() {
        this.deleteScript();
        this.done = false;
        this.loading = false;
        this.errors = [];
        this.onerrorEvent = null;
    }
    resetIfRetryingFailed() {
        if (this.failed) {
            this.reset();
        }
    }
    loadErrorCallback(e) {
        this.errors.push(e);
        if (this.errors.length <= this.retries) {
            const delay = this.errors.length * Math.pow(2, this.errors.length);
            console.log(`Failed to load Google Maps script, retrying in ${delay} ms.`);
            setTimeout(() => {
                this.deleteScript();
                this.setScript();
            }, delay);
        }
        else {
            this.onerrorEvent = e;
            this.callback();
        }
    }
    setCallback() {
        window.__googleMapsCallback = this.callback.bind(this);
    }
    callback() {
        this.done = true;
        this.loading = false;
        this.callbacks.forEach((cb) => {
            cb(this.onerrorEvent);
        });
        this.callbacks = [];
    }
    execute() {
        this.resetIfRetryingFailed();
        if (this.done) {
            this.callback();
        }
        else {
            // short circuit and warn if google.maps is already loaded
            if (window.google && window.google.maps && window.google.maps.version) {
                console.warn("Google Maps already loaded outside @googlemaps/js-api-loader." +
                    "This may result in undesirable behavior as options and script parameters may not match.");
                this.callback();
                return;
            }
            if (this.loading) ;
            else {
                this.loading = true;
                this.setCallback();
                this.setScript();
            }
        }
    }
}


//# sourceMappingURL=index.esm.js.map


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**************************!*\
  !*** ./assets/js/map.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _googlemaps_js_api_loader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @googlemaps/js-api-loader */ "./node_modules/@googlemaps/js-api-loader/dist/index.esm.js");

var googleMapLoader = new _googlemaps_js_api_loader__WEBPACK_IMPORTED_MODULE_0__.Loader({
  apiKey: window.map_script_data.google_maps_api_key,
  version: 'weekly'
}).load().then(function () {
  var coordinates = {
    lat: parseFloat(window.map_script_data.google_maps_latitude),
    lng: parseFloat(window.map_script_data.google_maps_longitude)
  };
  var map = new google.maps.Map(document.getElementById('map'), {
    center: coordinates,
    zoom: 14,
    disableDefaultUI: true,
    styles: [{
      'elementType': 'geometry',
      'stylers': [{
        'color': '#ebe3cd'
      }]
    }, {
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#523735'
      }]
    }, {
      'elementType': 'labels.text.stroke',
      'stylers': [{
        'color': '#f5f1e6'
      }]
    }, {
      'featureType': 'administrative',
      'elementType': 'geometry.stroke',
      'stylers': [{
        'color': '#c9b2a6'
      }]
    }, {
      'featureType': 'administrative.land_parcel',
      'elementType': 'geometry.stroke',
      'stylers': [{
        'color': '#dcd2be'
      }]
    }, {
      'featureType': 'administrative.land_parcel',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#ae9e90'
      }]
    }, {
      'featureType': 'landscape.natural',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#dfd2ae'
      }]
    }, {
      'featureType': 'poi',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#dfd2ae'
      }]
    }, {
      'featureType': 'poi',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#93817c'
      }]
    }, {
      'featureType': 'poi.park',
      'elementType': 'geometry.fill',
      'stylers': [{
        'color': '#a5b076'
      }]
    }, {
      'featureType': 'poi.park',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#447530'
      }]
    }, {
      'featureType': 'road',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#f5f1e6'
      }]
    }, {
      'featureType': 'road.arterial',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#fdfcf8'
      }]
    }, {
      'featureType': 'road.highway',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#f8c967'
      }]
    }, {
      'featureType': 'road.highway',
      'elementType': 'geometry.stroke',
      'stylers': [{
        'color': '#e9bc62'
      }]
    }, {
      'featureType': 'road.highway.controlled_access',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#e98d58'
      }]
    }, {
      'featureType': 'road.highway.controlled_access',
      'elementType': 'geometry.stroke',
      'stylers': [{
        'color': '#db8555'
      }]
    }, {
      'featureType': 'road.local',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#806b63'
      }]
    }, {
      'featureType': 'transit.line',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#dfd2ae'
      }]
    }, {
      'featureType': 'transit.line',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#8f7d77'
      }]
    }, {
      'featureType': 'transit.line',
      'elementType': 'labels.text.stroke',
      'stylers': [{
        'color': '#ebe3cd'
      }]
    }, {
      'featureType': 'transit.station',
      'elementType': 'geometry',
      'stylers': [{
        'color': '#dfd2ae'
      }]
    }, {
      'featureType': 'water',
      'elementType': 'geometry.fill',
      'stylers': [{
        'color': '#b9d3c2'
      }]
    }, {
      'featureType': 'water',
      'elementType': 'labels.text.fill',
      'stylers': [{
        'color': '#92998d'
      }]
    }]
  });
  new google.maps.Marker({
    position: coordinates,
    map: map
  });
});
})();

/******/ })()
;
//# sourceMappingURL=map.js.map