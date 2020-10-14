# Elasticsearch
## Installation
*Site:* https://www.elastic.co/es/downloads/elasticsearch

You can change the urls to have latest versions and the appropriate files for your operating system

### Download (terminal)
```
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-darwin-x86_64.tar.gz
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-darwin-x86_64.tar.gz.sha512
shasum -a 512 -c elasticsearch-7.9.2-darwin-x86_64.tar.gz.sha512
tar -xzf elasticsearch-7.9.2-darwin-x86_64.tar.gz
```
### Run elasticsearch (terminal)
```
cd elasticsearch-7.9.2
bin/elasticsearch
```
### Check elasticsearch (terminal)
```
curl http://localhost:9200

{
  "name" : "Pablos-MacBook-Pro.local",
  "cluster_name" : "elasticsearch",
  "cluster_uuid" : "M6THRyP3SeizAfcjjXU2Pg",
  "version" : {
    "number" : "7.9.2",
    "build_flavor" : "default",
    "build_type" : "tar",
    "build_hash" : "d34da0ea4a966c4e49417f2da2f244e3e97b4e6e",
    "build_date" : "2020-09-23T00:45:33.626720Z",
    "build_snapshot" : false,
    "lucene_version" : "8.6.2",
    "minimum_wire_compatibility_version" : "6.8.0",
    "minimum_index_compatibility_version" : "6.0.0-beta1"
  },
  "tagline" : "You Know, for Search"
}
```
# Kibana
## Installation
*Site:* https://www.elastic.co/es/downloads/kibana

You can change the urls to have latest versions and the appropriate files for your operating system

### Download kibana (terminal)
```
wget https://artifacts.elastic.co/downloads/kibana/kibana-7.9.2-darwin-x86_64.tar.gz
wget https://artifacts.elastic.co/downloads/kibana/kibana-7.9.2-darwin-x86_64.tar.gz.sha512
shasum -a 512 -c kibana-7.9.2-darwin-x86_64.tar.gz.sha512
tar -xzf kibana-7.9.2-darwin-x86_64.tar.gz
```
### Run kibana (terminal)
```
cd kibana-7.9.2-darwin-x86_64/
bin/kibana
```
### Check kibana (web browser)
http://localhost:5601/
