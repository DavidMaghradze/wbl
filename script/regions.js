import { colleges } from './data.js'

$(document).ready(function(){

    const collegeTemplate = (college) => `
    <div class="regions__row regions__row--main">
        <div class="regions__main"><i class="fas fa-angle-down"></i>${college.name}</div>
        <div class="regions__main">${college.enterprises.map(enterprise=> ` ${enterprise}` )}</div>
        <div class="regions__main">${college.program}</div>
        <div class="regions__main"><i class="fas fa-map-marker-alt"></i>${college.region}</div>
    </div>
    <div class="regions__row regions__row--dropdown">
        <div></div>
        <div>
            <h3><strong>ტელ.ნომერი:</strong>${college.phones.map(phone=> ` ${phone}` )}</h3>
            <h3><strong>ვებ-გვერდი:</strong><a href="${college.website}">${college.website}<a/></h3>
        </div>
        <div></div>
        <div>${college.address}</div>
    </div>
`

    const filter = (filterData) => {
       const filtered = colleges.filter(college=>{
           const {  selectedCollege, program, enterprise, region } = filterData
           if(selectedCollege && college.value !== selectedCollege) {
            return false
           }

           if(program && college.program !== program) {
               return false
           }

           if(enterprise && !college.enterprises.includes(enterprise)) {
               return false
           }

           if(region && college.region !== region) {
               return false
           }

           return college
       })

       const elements = filtered.map(college=>(
        collegeTemplate(college)
    ))
    $('#regions .regions-body').html(elements)

    $('.regions__row--main').click(function(){
        $(this).toggleClass('opened');
        $(this).next().slideToggle('fast', function(){
            if($(this).is(':visible'))
                $(this).css('display', 'flex');
        });
    })


    }

    const elements = colleges.map(college=>(
        collegeTemplate(college)
    ))

    $('#regions .regions-body').append(elements)

    $('.regions__row--main').click(function(){
        $(this).toggleClass('opened');
        $(this).next().slideToggle('fast', function(){
            if($(this).is(':visible'))
                $(this).css('display', 'flex');
        });
    })

    $('.form .filter').click(function(event){
        event.preventDefault()
        const college = $('#college :selected').val()
        const program = $('#program :selected').val()
        const enterprise = $('#enterprise :selected').val()
        const region = $('#region :selected').val()

        const filterData = { selectedCollege: college, program, enterprise, region }
        filter(filterData)
    })

})

function initMap(){
    var options = {
        zoom: 8,
        center: {lat: 42.3154, lng: 43.3569}
    }

    var map = new google.maps.Map(
        document.getElementById('map'),
        options
    )

    var markers = [
        {
            coords: {lat:42.26791, lng:42.69459}, 
            title: 'საზოგადოებრივი კოლეჯი "აისი"',
            number: '950 50 50 50',
            webpage: 'www.collegeaisi.ge'
        },

        {
            coords: {lat:41.8400, lng:43.3908}, 
            title: 'საზოგადოებრივი კოლეჯი "აისი"',
            number: '950 50 50 50',
            webpage: 'www.collegeaisi.ge'
        },

        {
            coords: {lat:41.9854, lng:44.1084}, 
            title: 'საზოგადოებრივი კოლეჯი "აისი"',
            number: '950 50 50 50',
            webpage: 'www.collegeaisi.ge'
        },

        {
            coords: {lat:41.7151, lng:44.8271}, 
            title: 'საზოგადოებრივი კოლეჯი "აისი"',
            number: '950 50 50 50',
            webpage: 'www.collegeaisi.ge'
        },

        {
            coords: {lat:41.5226, lng:45.0430}, 
            title: 'საზოგადოებრივი კოლეჯი "აისი"',
            number: '950 50 50 50',
            webpage: 'www.collegeaisi.ge'
        }
    ]

    markers.map(marker=>{
        addMarker(marker);
    })

    function addMarker(props){
        var marker = new google.maps.Marker({
        position: props.coords,
        map: map,
    });

        var infoWindow = new google.maps.InfoWindow({
            content: `
                      <div class="infoWindow">
                         <h1>სასწავლებელი:</h1>
                         <h2>${props.title}</h2>
                         <p><strong>ტელ.ნომერი: </strong>${props.number}</p>
                         <p><strong>ვებ-გვერდი: </strong><a href="http://www.collegeaisi.ge/" target="_blank">${props.webpage}</a></p>
                      </div>  
            `
        });

        marker.addListener('click', function(){
            infoWindow.open(map, marker);
        })
    
    }
}