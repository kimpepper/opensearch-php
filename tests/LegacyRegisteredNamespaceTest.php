<?php

declare(strict_types=1);

/**
 * Copyright OpenSearch Contributors
 * SPDX-License-Identifier: Apache-2.0
 *
 * OpenSearch PHP client
 *
 * @link      https://github.com/opensearch-project/opensearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */

namespace OpenSearch\Tests;

use OpenSearch;
use OpenSearch\ClientBuilder;
use OpenSearch\Serializers\SerializerInterface;
use OpenSearch\Transport;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class RegisteredNamespaceTest
 *
 * @subpackage Tests
 * @deprecated in 2.4.0 and will be removed in 3.0.0.
 */
class LegacyRegisteredNamespaceTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testRegisteringNamespace()
    {
        $builder = new FooNamespaceBuilder();

        $client = ClientBuilder::create()->registerNamespace($builder)->build();
        // @phpstan-ignore method.notFound
        $this->assertSame("123", $client->foo()->fooMethod());
    }

    public function testNonExistingNamespace()
    {
        $builder = new FooNamespaceBuilder();
        $client = ClientBuilder::create()->registerNamespace($builder)->build();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Namespace [bar] not found');

        // @phpstan-ignore method.notFound
        $client->bar()->fooMethod();
    }
}

/**
 * @codingStandardsIgnoreStart "Each class must be in a file by itself" - not worth the extra work here
 * @deprecated in 2.4.0 and will be removed in 3.0.0.
 */
class FooNamespaceBuilder implements OpenSearch\Namespaces\NamespaceBuilderInterface
{
    public function getName(): string
    {
        return "foo";
    }

    public function getObject(Transport|OpenSearch\TransportInterface $transport, SerializerInterface $serializer)
    {
        return new FooNamespace();
    }
}

class FooNamespace
{
    public function fooMethod()
    {
        return "123";
    }
}
// @codingStandardsIgnoreEnd
