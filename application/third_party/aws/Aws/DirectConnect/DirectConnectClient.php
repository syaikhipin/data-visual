<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
namespace Aws\DirectConnect;

use Aws\AwsClient;
/**
 * This client is used to interact with the **AWS Direct Connect** service.
 *
 * @method \Aws\Result allocateConnectionOnInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateConnectionOnInterconnectAsync(array $args = [])
 * @method \Aws\Result allocateHostedConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocateHostedConnectionAsync(array $args = [])
 * @method \Aws\Result allocatePrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result allocatePublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise allocatePublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result associateConnectionWithLag(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateConnectionWithLagAsync(array $args = [])
 * @method \Aws\Result associateHostedConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateHostedConnectionAsync(array $args = [])
 * @method \Aws\Result associateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result confirmConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmConnectionAsync(array $args = [])
 * @method \Aws\Result confirmPrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result confirmPublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmPublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result createBGPPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBGPPeerAsync(array $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \Aws\Result createDirectConnectGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAsync(array $args = [])
 * @method \Aws\Result createDirectConnectGatewayAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectConnectGatewayAssociationAsync(array $args = [])
 * @method \Aws\Result createInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInterconnectAsync(array $args = [])
 * @method \Aws\Result createLag(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createLagAsync(array $args = [])
 * @method \Aws\Result createPrivateVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result createPublicVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublicVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result deleteBGPPeer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBGPPeerAsync(array $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \Aws\Result deleteDirectConnectGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAsync(array $args = [])
 * @method \Aws\Result deleteDirectConnectGatewayAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectConnectGatewayAssociationAsync(array $args = [])
 * @method \Aws\Result deleteInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInterconnectAsync(array $args = [])
 * @method \Aws\Result deleteLag(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLagAsync(array $args = [])
 * @method \Aws\Result deleteVirtualInterface(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualInterfaceAsync(array $args = [])
 * @method \Aws\Result describeConnectionLoa(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionLoaAsync(array $args = [])
 * @method \Aws\Result describeConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsAsync(array $args = [])
 * @method \Aws\Result describeConnectionsOnInterconnect(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionsOnInterconnectAsync(array $args = [])
 * @method \Aws\Result describeDirectConnectGatewayAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAssociationsAsync(array $args = [])
 * @method \Aws\Result describeDirectConnectGatewayAttachments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewayAttachmentsAsync(array $args = [])
 * @method \Aws\Result describeDirectConnectGateways(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectConnectGatewaysAsync(array $args = [])
 * @method \Aws\Result describeHostedConnections(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeHostedConnectionsAsync(array $args = [])
 * @method \Aws\Result describeInterconnectLoa(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInterconnectLoaAsync(array $args = [])
 * @method \Aws\Result describeInterconnects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInterconnectsAsync(array $args = [])
 * @method \Aws\Result describeLags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLagsAsync(array $args = [])
 * @method \Aws\Result describeLoa(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoaAsync(array $args = [])
 * @method \Aws\Result describeLocations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLocationsAsync(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \Aws\Result describeVirtualGateways(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualGatewaysAsync(array $args = [])
 * @method \Aws\Result describeVirtualInterfaces(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualInterfacesAsync(array $args = [])
 * @method \Aws\Result disassociateConnectionFromLag(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateConnectionFromLagAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateLag(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLagAsync(array $args = [])
 * @method \Aws\Result updateVirtualInterfaceAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualInterfaceAttributesAsync(array $args = [])
 */
class DirectConnectClient extends AwsClient
{
}

?>