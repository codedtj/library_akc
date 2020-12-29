import {kvpToQueryParam} from "@/Util/stringHelper";

export function getImageUrl(image, params = null) {
    return `/image-gallery/images/${image}?` + kvpToQueryParam(params);
}
