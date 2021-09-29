import axios from "axios";

const HTTP = axios.create({
    baseURL: `https://where-to-eat.mystagingwebsite.com/`
});

export default HTTP;