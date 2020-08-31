PHP-NicTool
==========

The NicTool PHP module utilizes the existing API with SOAP calls to retrieve, update, and manipulate
DNS records. The available API calls can be referenced in the [NicTool docs](https://www.nictool.com/docs/api/api.shtml).

# Installation
Just add the NicTool class to your project.

# Usage:

```
$nictool = new NicTool($location, $uri, $username, $password);
$zone_records = $nictool->get_zone_records(nt_zone_id);
