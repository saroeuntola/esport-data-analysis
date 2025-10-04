import axios from "axios";
import { apiKey } from "../Api_Provider/apiKey/apiKey";

export const baseURL = axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1",
});
baseURL.defaults.headers.common["x-api-key"] = apiKey;

// export const urlImage = "http://127.0.0.1:8000/storage/image/";

