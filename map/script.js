let map = L.map("map").setView([40.18, 44.51], 7);

let nameMap = {
  Yerevan: "Erevan",
  "Vayots Dzor": "VayotsDzor",
};

let currentData = {};
let currentMode = "population";
let geojsonLayer;
let tempsData = {};

function style(feature) {
  const geoName = feature.properties.NAME_1;
  const key = nameMap[geoName] || geoName;
  const value = currentData[key] || 0;

  let fillColor;

  if (currentMode === "population") {
    fillColor = getPopulationColor(value);
  }else if (currentMode === "schools") {
    fillColor = getSchoolsColor(value);
  }else if (currentMode === "tumo") {
    fillColor = getTumoColor(value);
  }else if (currentMode === "temps") {
    fillColor = getTempColor(value);
  }else if (currentMode === "grass") {
    fillColor = getGreenColor(value);
  }else if (currentMode === "road") {
    fillColor = getRoadWidth(value);
  }else if (currentMode === "univer") {
    fillColor = getUnivColor(value);
  }

  return {
    fillColor,
    weight: 2,
    color: "#ffffff",
    fillOpacity: 0.6,
  };
}

// ! colors of every case
function getPopulationColor(v) {
  if (v > 800000) {
    return "#800026";
  }else if (v > 300000) {
    return "#BD0026";
  }else if (v > 200000) {
    return " #E31A1C";
  }else if (v > 150000) {
    return "#FC4E2A";
  }else if (v > 100000) {
    return "#FD8D3C";
  }else {
    return "#FFEDA0";
  }
}

function getSchoolsColor(q) {
  if (q > 250) {
    return "#175c41";
  }else if (q > 220) {
    return "#4ba870";
  }else if (q > 180) {
    return " #309840";
  }else if (q > 130) {
    return "#34b91d";
  }else if (q > 100) {
    return "#85de3d";
  }else {
    return "#b0f95d";
  }
}

function getTumoColor(q) {
  if (q >= 4) {
    return "#1846c5";
  }else if (q >= 3) {
    return " #0e6a98";
  }else if (q >= 1) {
    return "#1fc1ab";
  }else {
    return "#64ffed";
  }
}

function getTempColor(t) {
  // ? for the world
  // if(t > 55) {
  // 	return "#4f0d06"
  // }else if(t > 45) {
  // 	return "#981a0c"
  // }else if(t > 35) {
  // 	return "#b83818"
  // }else if(t > 30) {
  // 	return "#e0ca23"
  // }else if(t > 25) {
  // 	return "#648e07"
  // }else if(t > 20) {
  // 	return "#1fd31c"
  // }else if(t > 15) {
  // 	return "#2dde53"
  // }else if(t > 10) {
  // 	return "#02764c"
  // }else if(t > 0) {
  // 	return "#26dbbd"
  // }else if(t > -5) {
  // 	return "#1aa4bd"
  // }else if(t > -10) {
  // 	return "#2c96ec"
  // }else if(t > -15) {
  // 	return "#0263b3"
  // }else if(t > -20) {
  // 	return "#0f3c76"
  // }else {
  // 	return "#091e61"
  // }

  // ? for Armenia
  if (t > 40) {
    return "#800026";
  }else if (t > 30) {
    return "#bd0026";
  }else if (t > 25) {
    return "#e31a1c";
  }else if (t > 20) {
    return "#fc4e2a";
  }else if (t > 15) {
    return "#fd8d3c";
  }else if (t >= 11) {
    return "#feb24c";
  }else if (t >= 10.5) {
    return "#fed976";
  }else if (t >= 10) {
    return "#d9ef8b";
  }else if (t >= 9.5) {
    return "#a6d96a";
  }else if (t >= 9) {
    return "#66bd63";
  }else if (t >= 8.5) {
    return "#1a9850";
  }else if (t >= 7) {
    return "#74add1";
  }else if (t >= 5) {
    return "#4575b4";
  }else if (t > 0) {
    return "#313695";
  }else {
    return "#081d58";
  }
}

function getGreenColor(v) {
  if (v === "very high") {
    return "#0c8324";
  }else if (v === "high") {
    return "#26ba26";
  }else if (v === "medium") {
    return "#4eb466";
  }else if (v === "low") {
    return "#7aca66";
  }else {
    return "#87eba5";
  }
}

function getRoadWidth(w) {
  if (w > 1500) {
    return "#060d7b";
  }else if (w > 1400) {
    return "#1f57d8";
  }else if (w > 1200) {
    return "#145bb3";
  }else if (w > 900) {
    return "#2b93ca";
  }else {
    return "#23cacf";
  }
}

function getUnivColor(q) {
  if (q >= 6) {
    return "#4a0531";
  }else if (q >= 3) {
    return " #c6148eb9";
  }else if (q >= 1) {
    return "#dc27ac";
  }else {
    return "#e396d9";
  }
}

function onEachFeature(feature, layer) {
  if (feature.properties && feature.properties.NAME_1) {
    layer.bindPopup(feature.properties.NAME_1);
  }

  getTemps(feature.geometry.coordinates[0][0][0], feature.properties.NAME_1);

  layer.on({
    mouseover: function (e) {
      e.target.setStyle({
        fillOpacity: 0.8,
      });
    },
    mouseout: function (e) {
      geojsonLayer.resetStyle(e.target);
    },
  });
}

function loadData(type) {
  currentMode = type;

  if (type === "temps") {
    currentData = tempsData;
    geojsonLayer.setStyle(style);
    return;
  }
  
  fetch(`data/${type}.json`)
    .then((r) => r.json())
    .then((data) => {
      currentData = data;
      geojsonLayer.setStyle(style);
    });
}

let button = document.querySelectorAll("button");
button.forEach((btn) => {
  btn.addEventListener("click", () => {
    loadData(btn.dataset.type);
    button.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
  });
});

// ! fetch the data stats from the file
fetch("data/armenia-simple.geojson")
  .then((r) => r.json())
  .then((geoData) => {
    geojsonLayer = L.geoJson(geoData, {
      style,
      onEachFeature,
    }).addTo(map);

    loadData("population");
  });

// ! fetch temperature stats from open-meteo
async function getTemps(coords, region) {
  try {
    const response = await fetch(
      "https://api.open-meteo.com/v1/forecast?latitude=" +
      `${coords[0]}` + "&longitude=" + `${coords[1]}` + "&current_weather=true",
    );
    const temp = await response.json();

    tempsData[region] = temp.current_weather.temperature;
  } catch (error) {
    console.error("Fetch error:", error);
  }
}

// * locations
// const locations = [
//   [40.1792, 44.4991,
//     `<b style='color: red'>Yerevan</b><br />
//     Population: 1M<br/>
//     Capital of Armenia`
//   ],
//   [40.7894, 43.8475, "Gyumri"],
//   [40.7417, 44.8636,"Dilijan"],
//   [39.206198, 46.403770,"Kapan"]
// ];

// ? map marker icon
// let icon =  L.icon({
//   iconUrl: "https://png.pngtree.com/png-vector/20250408/ourmid/pngtree-3d-shiny-blue-map-marker-icon-and-stylish-location-png-image_15948335.png",
//   iconSize: [50, 50]
// })

// L.marker([40.1792, 44.499], ).addTo(map);

// ? loop for markering all locations in the matrix
// for(let n = 0; n<locations.length; n++) {
//   console.log(locations[n]);

//   let marker = L.marker(locations[n],{icon: icon}).addTo(map);
//   marker.bindPopup(locations[n][2]).openPopup();
// }

// const imageUrl = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSB0EhXIEgK-Azps5FI36TSxFNMd7Ilnz4Nw&s";

// ? creates polygon form being received with matrix of coordinates
// const polygon= L.polygon([
//   [41.1785163,44.1075002],
//   [41.2038219,44.8686361],
//   [40.7328017,44.6741008],
//   [40.8377251,44.0373874]
// ]).addTo(map)

// polygon.bindPopup("Lori area");

// ! FETCH API used to receive data weather forecast
// map.on("click", async (e) => {

//   let lat = e.latlng.lat
//   let lng = e.latlng.lng

//   L.popup()
//     .setLatLng(e.latlng)
//     .setContent(`
//       ${data.city + "<br />" + " " + "<p class='bold_text'>" + data.countryName + "</p>"

//       }
//       `)
//     .openOn(map)

// })
// .catch(error => {
//   console.error('Fetch error:', error);
// });
// })

// ! spot temperature
// const marker = L.marker([40.1792, 44.4991], {
//   draggable: true
// }).addTo(map);

// let temp = document.getElementById("temp");

// marker.on("dragend", (e) => {
//  const position = marker.getLatLng();

//  fetch('https://api.open-meteo.com/v1/forecast?latitude=' + position.lat + '&longitude=' + position.lng + '&current_weather=true')
//    .then(response => {
//       if (!response.ok) throw new Error('Network response was not OK');
//       return response.json();
//     })
//    .then(data => {
// 			temp.innerHTML = " "
//       temp.innerText += `${data.current_weather.temperature} C`;
//       })
//    .catch(error => {
//   		console.error('Fetch error:', error);
//   });

// });

// const geojsonLine = {
//   "type": "Feature",
//   "properties": {
//     "name": "Yerevan"
//   },
//   "geometry": {
//     "type": "Polygon",
//     "coordinates": [[
//       [44.50, 40.18],
//       [44.60, 40.18],
//       [44.60, 40.25],
//       [44.50, 40.25],
//       [44.50, 40.18]
//     ]]
//   }
// }

// const geojsonData = {
//   "type": "FeatureCollection",
//   "features": [
//     {
//       "type": "Feature",
//       "properties": { "name": "Vardenis" },
//       "geometry": {
//         "type": "Point",
//         "coordinates": [45.7346248, 40.1851003]
//       }
//     },
//     {
//       "type": "Feature",
//       "properties": { "name": "Area B" },
//       "geometry": {
//         "type": "Polygon",
//         "coordinates": [[
//           [44.52, 40.19],
//           [44.55, 40.19],
//           [44.55, 40.22],
//           [44.52, 40.22],
//           [44.52, 40.19]
//         ]]
//       }
//     }
//   ]
// };

// ?two polygons with the same name
// let multiPolygonGeoJSON = {
//       "type": "Feature",
//       "properties": {
//         "name": "Two Areas"
//       },
//       "geometry": {
//         "type": "MultiPolygon",
//         "coordinates": [
//           [
//             [ // First polygon
//               [44.50, 40.18],
//               [44.55, 40.18],
//               [44.55, 40.22],
//               [44.50, 40.22],
//               [44.50, 40.18]
//             ]
//           ],
//           [
//             [ // Second polygon
//               [44.60, 40.20],
//               [44.65, 40.20],
//               [44.65, 40.25],
//               [44.60, 40.25],
//               [44.60, 40.20]
//             ]
//           ]
//         ]
//       }
//     };

//   L.geoJSON(multiPolygonGeoJSON, {
//     onEachFeature: function (feature, layer) {
//       if (feature.properties.name) {
//         layer.bindPopup(feature.properties.name);
//       }
//     }
//   }).addTo(map);

// ? two polygons with different names
// let frstpol = {
//   "type": "Feature",
//   "properties": {
//     "name": "Two Areas"
//   },
//   "geometry": {
//     "type": "MultiPolygon",
//     "coordinates": [
//       [
//         [ // First polygon
//           [44.50, 40.18],
//           [44.55, 40.18],
//           [44.55, 40.22],
//           [44.50, 40.22],
//           [44.50, 40.18]
//         ]
//       ]
//     ]
//   }
// };

// let secpol = {
//   "type": "Feature",
//   "properties": {
//     "name": "Abovyan"
//   },
//   "geometry": {
//     "type": "MultiPolygon",
//     "coordinates": [
//       [
//         [ // Second polygon
//           [44.60, 40.20],
//           [44.65, 40.20],
//           [44.65, 40.25],
//           [44.60, 40.25],
//           [44.60, 40.20]
//         ]
//       ]
//     ]
//   }
// };

// L.geoJSON(frstpol, {
//   onEachFeature: function (feature, layer) {
//     if (feature.properties.name) {
//       layer.bindPopup(feature.properties.name);
//     }
//   }
// }).addTo(map);

// L.geoJSON(secpol, {
//   onEachFeature: function (feature, layer) {
//     if (feature.properties.name) {
//       layer.bindPopup(feature.properties.name);
//     }
//   }
// }).addTo(map);

// L.circle([40.1792, 44.4991], {
//   radius: 50000,
//   color: "red"
// }).addTo(map)

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© Tumo",
}).addTo(map);
