# Guide to My "Where to Eat" React App

This project was bootstrapped with Create React App.  It's packaged inside a WordPress theme to make show how React can consume WordPress's REST API.  It also gives a convenient way to add more restaurants to the possible options. 

Demo: [https://where-to-eat.mystagingwebsite.com/](https://where-to-eat.mystagingwebsite.com/)

## Setup

This app requires setting the environment prior to building.  This can be done in the /src/Environment.js file.  Change the `https://where-to-eat.mystagingwebsite.com/` to the WordPress site URL.  Then use npm run build to create a production version.

Sample data is included that can be imported into WordPress via Tools > Import.  It's important to activate the theme prior to importing the data.

### Available Scripts

In the project directory, you can run:

#### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in the browser.

The page will reload if you make edits.\
You will also see any lint errors in the console.

#### `npm run build`

Builds the app for production to the `build` folder.\
The "Eat" WordPress theme is designed to load the hashed script and CSS files from the build.

## To Do

Set the environment automatically so running build is not necessary unless making changes.
