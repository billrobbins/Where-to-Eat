import React, { Component } from 'react';
import HTTP from './Environment.js';

export default class Card extends Component {
    
   state = {
        styles: [],
        locations: [],
        restaurants: []
    }

    componentDidMount() {
        HTTP.get("wp-json/ijab/v1/options/")
        .then(res => {
            this.setState({
                styles: res.data.styles,
                locations: res.data.locations
            })
        })
        .catch(error => {
            console.log( 'Error fetching and parsing data: ', error );
        });

    }

    handleSubmit = ( event ) => {

        event.preventDefault();

        let selectedStyle = event.target.styles.value;
        let selectedLocation = event.target.locations.value;
        let updatedRestaurants = '';

        HTTP.get(`wp-json/ijab/v1/restaurants/?location=${selectedLocation}&style=${selectedStyle}`)
        .then(res => {
            this.setState({
                restaurants: res.data
            })
        })
        .catch(error => {
            console.log( 'Error fetching and parsing data: ', error );
        });
        
    }
    
    render() {
    
        let styleList = this.state.styles.map(
            style => 
            <option key={ style.term_id } value={ style.slug }>
                { style.name }
            </option>
        );

        let locationList = this.state.locations.map(
            location => 
            <option key={ location.term_id } value={ location.slug }>
                { location.name }
            </option>
        );

        let restaurantList = this.state.restaurants.map(
            restaurant => 
            <p className="selected-restaurant" key={ restaurant.id } dangerouslySetInnerHTML={{ __html: restaurant.name }}></p>
        );

        return (

            <div className="card">

                <div className="results">
                    { restaurantList }
                </div>

                <form className="selecting" onSubmit={ this.handleSubmit }>
                            
                    <div className="selector">
                        <label>Select a style:
                            <select name="styles" id="styles" value={ this.state.style }>{ styleList }</select>
                        </label>
                    </div>

                    <div className="selector">
                        <label>Select a location:
                            <select name="locations" id="locations" value={ this.state.location }>{ locationList }</select>
                        </label>
                    </div>
                
                    <button type="submit" id="submit" className="accent">Load</button>

                </form>

            </div>

        );

    }
    
}
