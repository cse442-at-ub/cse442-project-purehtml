def data(url):
    data = []
    json_data = []
    import urllib.request
    import json
    url = urllib.request.urlopen(url).read()
    decoded_url = url.decode()
    object = json.loads(decoded_url)
    for dict in object:
        if "vehicle_make" and "vehicle_year" in dict.keys():
            data.append(dict)
    for dict in data:
        json_data.append([dict["vehicle_make"],dict["vehicle_year"]])
    return json_data

def car_make():
    array = data("https://data.buffalony.gov/resource/pamv-gash.json")
    make = []
    for sublist in array:
       make.append(sublist[0])
    return make

def make():
    array = [car_make()]
    counts = {}
    for sublist in array:
        for item in sublist:
            if item not in counts:
                counts[item] = 0
            counts[item] += 1
    sort = [(k, counts[k]) for k in sorted(counts, key=counts.get, reverse=True)]
    dict = {}
    j = 0
    for i in sort:
        if j < 10:
            dict[i[0]] = i[1]
        else: break
        j += 1
    return dict

def car_year():
    array = data("https://data.buffalony.gov/resource/pamv-gash.json")
    year = []
    for sublist in array:
        if len(sublist[1]) == 4:
            year.append(sublist[1])
    return year

def year():
    array = [car_year()]
    counts = {}
    for sublist in array:
        for item in sublist:
            if item not in counts:
                counts[item] = 0
            counts[item] += 1
    return counts

def car():
    import json
    data_array = [make(),year()]
    return json.dumps(data_array)












