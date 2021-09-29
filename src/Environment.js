import axios from "axios";

const HTTP = axios.create({
    baseURL: `http://eat.local/`
});


export default HTTP;