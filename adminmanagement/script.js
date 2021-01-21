const options = {
    // Required: API key
    key: 'LwoyhbNqjlhbP5PJP3S171T2KMA7nH4w',

    // Put additional console output
    verbose: true,

    // Optional: Initial state of the map
    lat: 23.9000025,
    lon: 90.5091047,
    zoom: 8,
};

// Initialize Windy API
windyInit(options, windyAPI =>
{
    // windyAPI is ready, and contain 'map', 'store',
    // 'picker' and other usefull stuff

    const { map } = windyAPI;
// .map is instance of Leaflet map

L.popup()
    .setLatLng([26.633914, 92.6801153])
    .setContent('Hello World')
    .openOn(map);
});