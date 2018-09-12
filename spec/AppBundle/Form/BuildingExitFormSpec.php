<?php

namespace spec\AppBundle\Form;

use AppBundle\Form\BuildingExitForm;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildingExitFormSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BuildingExitForm::class);
    }

    function it_has_required_configureOptions_method(OptionsResolver $resolver)
    {
        $resolver->setDefaults(Argument::any())->shouldBeCalled();
        $this->configureOptions($resolver);
    }

    function it_has_a_buildForm_method_which_configures_it(FormBuilderInterface $builder)
    {
        $builder->add(Argument::any(), Argument::any(), Argument::any())->willReturn($builder);
        $builder->get(Argument::any())->willReturn($builder);

        $this->buildForm($builder, $options = []);
    }
}
