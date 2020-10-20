# ELASTICSEARCH
## index of contents
- [Elasaticsearch](#elasticsearch)
    - [Installation](#install-elasticsearch)
        - [Download (terminal)](#download-terminal-elasticsearch)
        - [Run elasticsearch (terminal)](#run-elasticsearch-terminal)
        - [Check elasticsearch (terminal)](#check-elasticsearch-terminal)
- [Kibana](#kibana)
    - [Installation](#install-kibana)
    - [Download](#download-kibana-terminal)
    - [Run (terminal)](#run-kibana-terminal)
    - [Check (browser)](#check-kibana-web-browser)
- [Basic Architecture](#basic-architecture)
    - [Nodes](#nodes)
    - [Data stored and distribution](#how-is-the-data-distributed-between-the-nodes-and-how-does-elasticsearch-know-where-some-data-is-stored)
    - [How to create a cluster?](#how-to-create-a-cluster)
    - [How is the data organized and stored?](#how-is-the-data-organized-and-stored)
    - [Summary](#in-summary)
- [Sharding and Scalability](#sharding-and-scalability)
- [Replication](#replication)

## Elasticsearch
### Install Elasticsearch
*Site:* https://www.elastic.co/es/downloads/elasticsearch

You can change the urls to have latest versions and the appropriate files for your operating system

#### Download (terminal) Elasticsearch
```
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-darwin-x86_64.tar.gz
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-darwin-x86_64.tar.gz.sha512
shasum -a 512 -c elasticsearch-7.9.2-darwin-x86_64.tar.gz.sha512
tar -xzf elasticsearch-7.9.2-darwin-x86_64.tar.gz
```
#### Run elasticsearch (terminal)
```
cd elasticsearch-7.9.2
bin/elasticsearch
```
#### Check elasticsearch (terminal)
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
## Kibana
### Install Kibana
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

## Basic Architecture
### Nodes
When we start Elasticsearch, what actually happens is that we start a node. A node is essentially an Elasticsearch instance that stores data.
To make sure we can store many terabytes of data, if necessary we can run as many nodes as we want.
Each node will store a part of our data.
In this way, we can store data in multiple virtual or physical machines, allowing us to store many terabytes of data, even if each machine only has a disk capacity of a few hundred gigabytes.
A node refers to an Elasticsearch instance and not a machine, so any number of nodes can run on the same machine.
This means, on your development machine, you can start five nodes if you want, without having to deal with virtual machines or containers.
With that said, you typically need to separate things in a production environment so that each node runs on a dedicated machine, a virtual machine, or inside a container.

### How is the data distributed between the nodes and how does Elasticsearch know where some data is stored?
The short answer to this question is that each node belongs to what is called a **cluster.**
A cluster is a collection of related nodes that together contain all of our data.
We can have many clusters if we want, but one is usually sufficient.
Clusters are completely independent of each other by default.
It is possible to search across clusters, but it is not very common to do so.
You can run multiple clusters that serve different purposes; for example, you could have one cluster to drive search for an e-commerce application and another for Application Performance Management (APM).
The reasons for dividing things into multiple clusters are usually to logically separate things and to be able to configure things differently.

### How to create a cluster?
What actually happens when you start a node is that a cluster is formed automatically.
When a node starts up, it will join an existing cluster if it is configured to do so, or it will create its own cluster consisting of only that node.
An Elasticsearch node will always be part of a cluster, even if there are no other nodes.
There are some issues with having a single node in terms of availability and scalability, but for development purposes it is perfectly fine to have a cluster that consists of only one node.

### How is the data organized and stored?
Each unit of data that is stored within your cluster is called a **document.**
Documents are JSON objects that contain whatever data you want.
When you index a document, the original JSON object that was sent to Elasticsearch is stored along with some metadata that Elasticsearch uses internally.
The JSON object that we send to Elasticsearch is stored inside a field called "_source" and Elasticsearch then stores some metadata along with that object.
Every document within Elasticsearch is stored within an **index.**
An index groups documents logically, in addition to providing configuration options related to scalability and availability.
Therefore, an index is a collection of documents that have similar characteristics and are logically related.
For example, a document referring to people could be stored within an index called "people". Whereas you could have a different index called "departments", containing several departments, each of which will be stored as a document.
An index can contain as many documents as you want, so there is no hard limit.
Regarding the data search, you must specify the index in which you want to search for documents, which means that the search queries are actually executed against indexes.

### In summary
An Elasticsearch **cluster** is a collection of **nodes**, which are responsible for storing data.
A node refers to a running **Elasticsearch instance**, which can run on a physical or virtual machine, or inside a Docker container, for example.
Data is stored as **documents**, a document being a unit of information.
A document can represent anything.
Each document belongs to an **index**, which is a way of logically grouping related documents.

## Sharding and Scalability

## Replication
