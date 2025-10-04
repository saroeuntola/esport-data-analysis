import { baseURL } from "../Config/baseURL";

const getEsportData = async () => {
    try {
        const response = await baseURL.get("/esport-data");
        return response.data;
    } catch (error) {
        return error.response;
    }
};
const uploadEsportDataForm = async (Data) => {
    try {
        const response = await baseURL.post("/upload-data", Data, {
            headers: {
                "Content-Type": "multipart/form-data",
                "Accept": "application/json"
            },
        });
        return response.data;
    } catch (error) {
        return error.response;
    }
};

export {getEsportData, uploadEsportDataForm};