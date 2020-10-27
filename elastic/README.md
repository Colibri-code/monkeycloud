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
- [Logstash](#logstash)
- [Architecture](#architecture)
    - [Basic Architecture](#basic-architecture)
        - [Nodes](#nodes)
        - [Data stored and distribution](#how-is-the-data-distributed-between-the-nodes-and-how-does-elasticsearch-know-where-some-data-is-stored)
        - [How to create a cluster?](#how-to-create-a-cluster)
        - [How is the data organized and stored?](#how-is-the-data-organized-and-stored)
        - [Summary](#in-summary)
    - [Sharding and Scalability](#sharding-and-scalability)
        - [Sharding](#sharding)
        - [Common use cases of sharding](#common-use-cases-of-sharding)
        - [Total of chunks](#total-of-chunks)
    - [Replication](#replication)
- [Index](#index)

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

## Logstash
### Install Logstash
*Site:* https://www.elastic.co/es/downloads/logstash

You can change the urls to have latest versions and the appropriate files for your operating system

### Download Logstash (terminal)
```
wget https://artifacts.elastic.co/downloads/logstash/logstash-7.9.3.tar.gz
wget https://artifacts.elastic.co/downloads/logstash/logstash-7.9.3.tar.gz.sha512
shasum -a 512 -c logstash-7.9.3.tar.gz.sha512
tar -xzf logstash-7.9.3.tar.gz
```
### Prepare a logstash.conf config file

### Run Logstash (terminal)
```
cd logstash-7.9.3
bin/logstash -f logstash.conf
```

## Architecture
### Basic Architecture
#### Nodes
When we start Elasticsearch, what actually happens is that we start a node. A node is essentially an Elasticsearch instance that stores data.
To make sure we can store many terabytes of data, if necessary we can run as many nodes as we want.
Each node will store a part of our data.
In this way, we can store data in multiple virtual or physical machines, allowing us to store many terabytes of data, even if each machine only has a disk capacity of a few hundred gigabytes.
A node refers to an Elasticsearch instance and not a machine, so any number of nodes can run on the same machine.
This means, on your development machine, you can start five nodes if you want, without having to deal with virtual machines or containers.
With that said, you typically need to separate things in a production environment so that each node runs on a dedicated machine, a virtual machine, or inside a container.

#### How is the data distributed between the nodes and how does Elasticsearch know where some data is stored?
The short answer to this question is that each node belongs to what is called a **cluster.**
A cluster is a collection of related nodes that together contain all of our data.
We can have many clusters if we want, but one is usually sufficient.
Clusters are completely independent of each other by default.
It is possible to search across clusters, but it is not very common to do so.
You can run multiple clusters that serve different purposes; for example, you could have one cluster to drive search for an e-commerce application and another for Application Performance Management (APM).
The reasons for dividing things into multiple clusters are usually to logically separate things and to be able to configure things differently.

#### How to create a cluster?
What actually happens when you start a node is that a cluster is formed automatically.
When a node starts up, it will join an existing cluster if it is configured to do so, or it will create its own cluster consisting of only that node.
An Elasticsearch node will always be part of a cluster, even if there are no other nodes.
There are some issues with having a single node in terms of availability and scalability, but for development purposes it is perfectly fine to have a cluster that consists of only one node.

#### How is the data organized and stored?
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

#### In summary
An Elasticsearch **cluster** is a collection of **nodes**, which are responsible for storing data.
A node refers to a running **Elasticsearch instance**, which can run on a physical or virtual machine, or inside a Docker container, for example.
Data is stored as **documents**, a document being a unit of information.
A document can represent anything.
Each document belongs to an **index**, which is a way of logically grouping related documents.

### Sharding and Scalability
A cluster consists of one or more nodes.
This is one of the ways Elasticsearch can scale, both when it comes to data storage and disk space.
If we want to store 1 terabyte of data and we only have one node with 500 gigabytes of space, obviously that is not going to work.
However, if we add an additional node with sufficient capacity, Elasticsearch can store data on both nodes, which means that the cluster now has sufficient storage capacity.

#### Sharding
But how does that really work?
Elasticsearch does this using something called sharding.
It is similar to the concept of sharding in databases.
Sharding is a way of dividing an index into separate parts, where each part is called a shard.
Sharding is done at the index level and not at the node or cluster level.
This is because one index can contain one billion documents, while another can only contain a few hundred.
This affects the way the indexes are configured.
The main reason for dividing an index into multiple chunks is to be able to scale the data volume horizontally.
Suppose we have two nodes, each with 500 gigabytes of storage space available for Elasticsearch. And we have a huge index that takes up 600 gigabytes of storage on its own, which means that the entire index doesn't fit on any of the nodes.
Therefore, running the index on a single shard is not an option, because a shard must be placed on a single node.
Instead, we can divide the index into two chunks, each of which requires 300 gigabytes of disk space.
By doing this, we can now store a chunk on each of the two nodes without running out of disk space.
We could also have a larger number of shards if we wanted, like four shards of 150 gigabytes each.
We still have room to spare, so we could use it for other indexes if necessary.
To be clear, a shard can be placed on any node, so if an index has five shards, for example, there is no need to spread them across five different nodes. We could, but we don't have to.

#### Common use cases of sharding
Of course, sharding goes hand in hand with increasing the available disk space if necessary, potentially by adding more nodes to the cluster.
Each shard is independent and you can think of a shard as a fully functional index on its own.
That's not 100% accurate, but close enough.
Elasticsearch is built on Apache Lucene. Each chunk is actually a Lucene index.
This means that an Elasticsearch index with five shards actually consists of five Lucene indexes under the hood.
While a fragment does not have a predefined size in terms of allocated disk space, there is a limit to the number of documents that a fragment can store, which is just over two billion documents.
The main reason for fragmenting an index is to be able to scale its volume of data, in other words, the number of documents it can store.
By using sharding you can store billions of documents in a single index, which would normally not be feasible without sharding.
Another common use case for sharding an index is breaking an index into smaller chunks that are easier to fit across nodes.
Yet another reason fragmentation is useful is that it allows queries to be distributed and parallelized across the fragments of an index.
What this means is that a search query can run on multiple shards at the same time, increasing throughput and throughput.
Remember that shards can be stored on different nodes, which means that the hardware of multiple nodes can be used.
By default, each of our indexes can be stored in a single chunk, but this can be configured when creating indexes.
Until Elasticsearch version 7, the default was for an index to have five shards.
However, having five shards for very small indexes is unnecessary.
When people created many small indexes within small groups, they ran into an excessive fragmentation problem, which meant they had too many fragments.
At the same time, it was previously not possible to change the number of shards once an index had been created.
So what had to be done if the number of fragments needed to be increased was to create a new index with more fragments and move over the documents.
This was not only inconvenient, it could also be a time-consuming process.
To overcome these challenges, indexes are now built with a single shard by default, since Elasticsearch version 7.
For small to medium sized indices, this is likely to be sufficient.
If you need to increase the number of fragments, there is a Split API for this.
It still involves creating a new index, but the process is much easier, as Elasticsearch does the heavy lifting for us.
To reduce the number of fragments, there is a Shrink API that does it for us.
Therefore, you should try to anticipate how many documents an index will contain in the not too distant future when creating an index.
If you think you will store millions of documents within an index, you may want to consider adding a few chunks at index creation.
Adding the extra snippets up front is easier for you and you are less likely to run into bottlenecks in the future.

#### Total of chunks
So how many fragments should you choose?
Unfortunately, the answer to this question is "it depends."
There is no definitive answer to this, because it depends on a number of factors, such as the number of nodes within the cluster, the capacity of the nodes, the number of indexes and their sizes, the number of queries that are executed against the indexes, etc.
Needless to say, there are a lot of variables involved, so there is really no formula that you can use.
However, as a general rule of thumb, a decent place to start would be to choose five snippets if you anticipate millions of documents being added to an index.
Otherwise, you should completely stick to the default value of a chunk and then increase the number if necessary.
In short, sharding is a way to subdivide an index into smaller parts, each of which is a shard.
This has two main purposes; allow the index to grow in size and improve index performance.
The main reason is to scale data storage, so higher performance is probably more of an advantage.
By using sharding, you can store an index that takes up 700 gigabytes of disk space, even if you don't have a single node that can store that much data.
An index has a chunk by default.
For small to medium indices, that is usually sufficient.
For indexes that you anticipate will store a lot of data, you may want to increase the number of shards in creating the index.
A decent number for most of these cases would be five, but it depends on several factors.

### Replication

## Index

# Notes - Tools
## check listen ports (mac)
```
lsof -nP +c 15 | grep LISTEN
```
