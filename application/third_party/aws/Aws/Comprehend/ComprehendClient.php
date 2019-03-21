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
namespace Aws\Comprehend;

use Aws\AwsClient;
/**
 * This client is used to interact with the **Amazon Comprehend** service.
 * @method \Aws\Result batchDetectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result batchDetectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectEntitiesAsync(array $args = [])
 * @method \Aws\Result batchDetectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result batchDetectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSentimentAsync(array $args = [])
 * @method \Aws\Result batchDetectSyntax(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDetectSyntaxAsync(array $args = [])
 * @method \Aws\Result createDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result createEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result deleteDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result deleteEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result describeDocumentClassificationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassificationJobAsync(array $args = [])
 * @method \Aws\Result describeDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result describeDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityRecognizerAsync(array $args = [])
 * @method \Aws\Result describeKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result describeTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTopicsDetectionJobAsync(array $args = [])
 * @method \Aws\Result detectDominantLanguage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectDominantLanguageAsync(array $args = [])
 * @method \Aws\Result detectEntities(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @method \Aws\Result detectKeyPhrases(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectKeyPhrasesAsync(array $args = [])
 * @method \Aws\Result detectSentiment(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSentimentAsync(array $args = [])
 * @method \Aws\Result detectSyntax(array $args = [])
 * @method \GuzzleHttp\Promise\Promise detectSyntaxAsync(array $args = [])
 * @method \Aws\Result listDocumentClassificationJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassificationJobsAsync(array $args = [])
 * @method \Aws\Result listDocumentClassifiers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentClassifiersAsync(array $args = [])
 * @method \Aws\Result listDominantLanguageDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDominantLanguageDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listEntitiesDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listEntityRecognizers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityRecognizersAsync(array $args = [])
 * @method \Aws\Result listKeyPhrasesDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listKeyPhrasesDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listSentimentDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSentimentDetectionJobsAsync(array $args = [])
 * @method \Aws\Result listTopicsDetectionJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicsDetectionJobsAsync(array $args = [])
 * @method \Aws\Result startDocumentClassificationJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDocumentClassificationJobAsync(array $args = [])
 * @method \Aws\Result startDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result startEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result startKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result startSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result startTopicsDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startTopicsDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopDominantLanguageDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopDominantLanguageDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopEntitiesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopEntitiesDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopKeyPhrasesDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopKeyPhrasesDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopSentimentDetectionJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSentimentDetectionJobAsync(array $args = [])
 * @method \Aws\Result stopTrainingDocumentClassifier(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingDocumentClassifierAsync(array $args = [])
 * @method \Aws\Result stopTrainingEntityRecognizer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTrainingEntityRecognizerAsync(array $args = [])
 */
class ComprehendClient extends AwsClient
{
}

?>