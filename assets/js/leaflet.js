const contentStrings = [`
<div>
  <h1>Taourirt (CR Asni)</h1>
  <h3>Distribution de logements mobiles à Taourirt </h3>
  <div>
    <p>
      <a href="blog-single.html" >
       <h2> En savoir plus<h2>
      </a> 
    </p>
  </div>
</div>`,
`
<div>
  <h1>Tahanaout</h1>
  <h3>Don de médicaments à l’hôpital public </h3>
  <div>
    <p>
      <a href="blog-single.html" >
       <h2> En savoir plus<h2>
      </a> 
    </p>
  </div>
</div>`,
`
<div>
  <h1>Tidili</h1>
  <h3>Projet d'assainissement </h3>
  <div>
    <p>
      Construction des égouts, des fontaines d'eau et des installations sanitaires
      <a href="blog-single.html" >
       <h2> En savoir plus<h2>
      </a> 
    </p>
  </div>
</div>`];

var coord =[
    { "position": { "lat": 31.239239, "lng": -7.983509 }, "title": "Marrakech" },
    { "position": { "lat": 31.352720, "lng": -7.950875 }, "title": "Tahnouat" },
    { "position": { "lat": 31.470078, "lng": -7.546632 }, "title": "Tidili" }
  ]
  


var map = L.map('map').setView([31.631, -8.002], 9);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  scrollWheelZoom: false,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);




// Données des marqueurs
var markersData =  [
    { position: [31.239239, -7.983509], title: 'Taourirt (CR Asni)' },
    { position: [31.352720, -7.950875], title: 'Tahnouat' },
    { position: [31.470078, -7.546632], title: 'Tidili' }
  ];
  
  // Parcours des données des marqueurs
  markersData.forEach(function(markerInfo) {
   
    // Création du marqueur
    var marker = L.marker(markerInfo.position, {
      color: 'red',
    }).addTo(map);
  
    console.log("kkkkkkkkkkkkkkk"+villageDataJson );
    // Ajout d'une info-bulle au clic sur le marqueur
    var popupContent = `<div>
                          <h1>${markerInfo.title}</h1>
                          <h3>Don de médicaments à l’hôpital public</h3>
                          <div>
                              <p><a href="blog-single.html"><h2>En savoir plus</h2></a></p>
                          </div>
                        </div>`;
    marker.bindPopup(popupContent).openPopup();
  });
  



var polygon = L.polygon([
    [51.509, -0.08],
    [51.503, -0.06],
    [51.51, -0.047]
]).addTo(map);

polygon.bindPopup("I am a polygon.");