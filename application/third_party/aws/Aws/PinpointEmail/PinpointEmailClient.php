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
namespace Aws\PinpointEmail;

use Aws\AwsClient;
/**
 * This client is used to interact with the **Amazon Pinpoint Email Service** service.
 * @method \Aws\Result createConfigurationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @method \Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @method \Aws\Result createDedicatedIpPool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDedicatedIpPoolAsync(array $args = [])
 * @method \Aws\Result createDeliverabilityTestReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeliverabilityTestReportAsync(array $args = [])
 * @method \Aws\Result createEmailIdentity(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEmailIdentityAsync(array $args = [])
 * @method \Aws\Result deleteConfigurationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @method \Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @method \Aws\Result deleteDedicatedIpPool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDedicatedIpPoolAsync(array $args = [])
 * @method \Aws\Result deleteEmailIdentity(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEmailIdentityAsync(array $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @method \Aws\Result getBlacklistReports(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlacklistReportsAsync(array $args = [])
 * @method \Aws\Result getConfigurationSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationSetAsync(array $args = [])
 * @method \Aws\Result getConfigurationSetEventDestinations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array $args = [])
 * @method \Aws\Result getDedicatedIp(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpAsync(array $args = [])
 * @method \Aws\Result getDedicatedIps(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDedicatedIpsAsync(array $args = [])
 * @method \Aws\Result getDeliverabilityDashboardOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliverabilityDashboardOptionsAsync(array $args = [])
 * @method \Aws\Result getDeliverabilityTestReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliverabilityTestReportAsync(array $args = [])
 * @method \Aws\Result getDomainStatisticsReport(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainStatisticsReportAsync(array $args = [])
 * @method \Aws\Result getEmailIdentity(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEmailIdentityAsync(array $args = [])
 * @method \Aws\Result listConfigurationSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @method \Aws\Result listDedicatedIpPools(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDedicatedIpPoolsAsync(array $args = [])
 * @method \Aws\Result listDeliverabilityTestReports(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDeliverabilityTestReportsAsync(array $args = [])
 * @method \Aws\Result listEmailIdentities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEmailIdentitiesAsync(array $args = [])
 * @method \Aws\Result putAccountDedicatedIpWarmupAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountDedicatedIpWarmupAttributesAsync(array $args = [])
 * @method \Aws\Result putAccountSendingAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountSendingAttributesAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetDeliveryOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetDeliveryOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetReputationOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetReputationOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetSendingOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetSendingOptionsAsync(array $args = [])
 * @method \Aws\Result putConfigurationSetTrackingOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putConfigurationSetTrackingOptionsAsync(array $args = [])
 * @method \Aws\Result putDedicatedIpInPool(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpInPoolAsync(array $args = [])
 * @method \Aws\Result putDedicatedIpWarmupAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDedicatedIpWarmupAttributesAsync(array $args = [])
 * @method \Aws\Result putDeliverabilityDashboardOption(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliverabilityDashboardOptionAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityDkimAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityDkimAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityFeedbackAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityFeedbackAttributesAsync(array $args = [])
 * @method \Aws\Result putEmailIdentityMailFromAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEmailIdentityMailFromAttributesAsync(array $args = [])
 * @method \Aws\Result sendEmail(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @method \Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 */
class PinpointEmailClient extends AwsClient
{
}

?>