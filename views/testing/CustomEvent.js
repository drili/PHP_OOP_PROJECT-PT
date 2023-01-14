document.addEventListener('myEvent', function (event) {
    alert('Event ' + event.type + ' occurred with data: ' + JSON.stringify(event.detail));
});

var event1 = new CustomEvent('myEvent', { 'detail': { 'example': 'example data' } });
document.dispatchEvent(event1);

// *** OR

var event2 = new CustomtEvent("myEvent", {
    'detail': { "example 2": "test data klajwdlk a" },
    'detail2': { "data 2 object:": "jahdkja hwdjkahwadkjha wkjdh akjwhd kjahwd" }
});
document.dispatchEvent(event2);

// *** Access data:
event3 // event3.detail.example1 etc...